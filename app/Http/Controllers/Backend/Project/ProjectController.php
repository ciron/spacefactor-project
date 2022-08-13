<?php
/**
 * Created by PhpStorm.
 * User: My Dell
 * Date: 21-03-2020
 * Time: 09:18 PM
 */

namespace App\Http\Controllers\Backend\Project;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

use App\Models\Project\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('projects.id')
            ->select(['projects.id as project_id', 'projects.*', 'category.*'])
            ->join('category', 'category.id', '=', 'projects.category')
            ->paginate();
        $data = [
            'title' => 'Project',
            'projects' => $projects
        ];
        return view('backend.project.index', $data);
    }

    public function create()
    {
        $category = Category::select('cat_name', 'id', 'type')->where('type','PROJECT')->get();
        $design_service = Category::select('cat_name', 'id', 'type')->where('type','DESIGN_SERVICE')->get();

        foreach ($category as $item) {

            $data['categories'][$item['id']] = $item['type'] . ' - ' . $item['cat_name'];
        }
        foreach ($design_service as $ds) {

            $data['design_service'][$ds['id']] = $ds['type'] . ' - ' . $ds['cat_name'];
        }

        return view('backend.project.create', $data)->withFlashSuccess('Successfully Added');
    }

    public function store(Request $req)
    {
        $project = new Project();
        $project->title = $req->input('title');
        $project->slug = strtolower(str_replace([' ', '_'], '-', $req->input('title'))).'-'.uniqid();
        $project->description = $req->input('description');
        $project->meta = $req->input('meta');
        $project->banner = $req->input('banner');
        $project->category = $req->input('category');
        $project->design_service = $req->input('design_service');


        try {
            $this->validate($req, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:jpeg,png,jpg'
            ]);
        } catch (ValidationException $e) {
        }


        if($req->hasfile('gallery'))
        {
            foreach($req->file('gallery') as $file)
            {
                $name = uniqid(time()).'.'.$file->extension();
                $file->move(public_path().'/project_gallery/', $name);
                $data[] = $name;
            }

            $project->gallery = json_encode($data);
        }



        if ($req->hasFile('banner')) {
            $file = $req->file('banner');
            $fileName = time() . '.' . $file->extension();
            $destinationPath = public_path() . '/project_banner/';
            $file->move($destinationPath, $fileName);

            $project->banner = $fileName;
        }

        $project->save();
        return redirect()->back();
    }





    public function delete($id)
    {
        Db::table('projects')->where('id', '=', $id)->delete();

        return redirect()->back();
    }
}