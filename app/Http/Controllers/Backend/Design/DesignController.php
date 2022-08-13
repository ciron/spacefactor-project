<?php
/**
 * Created by PhpStorm.
 * User: My Dell
 * Date: 21-03-2020
 * Time: 09:18 PM
 */

namespace App\Http\Controllers\Backend\Design;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

use App\Models\Design\Design;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function index()
    {
        $designs = Design::orderBy('design.id')->select(['design.id as design_id','design.*','category.*'])->join('category','category.id','=','design.category')
            ->paginate();
        $data = [
            'title' => 'Design',
            'designs' => $designs
        ];
        return view('backend.design.index', $data);
    }

    public function create()
    {
        $category = Category::select('cat_name','id','type')->get();

        foreach ($category as $item) {

            $data['categories'][$item['id']] =  $item['type'] . ' - '.$item['cat_name'];
        }

        return view('backend.design.create',$data)->withFlashSuccess('Successfully Added');
    }

    public function store(Request $req)
    {
        $design = new Design;
        $design->title = $req->input('title');
        $design->sub_title = $req->input('sub_title');
        $design->meta = $req->input('meta');
        $design->type = $req->input('type');
        $design->active = $req->input('active', 'yes');
        $design->category = $req->input('category');
        if ( $req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = time() . '.' . $file->extension();
            $destinationPath = public_path() . '/design_image/';
            $file->move($destinationPath, $fileName);
            $design->image = $fileName;
        }

        $design->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $design = Design::find($id);
        $data = [
            'title' => 'Design',
            'design' => $design
        ];
        $data['categories'] = Category::pluck('cat_name','id');

        return view('backend.design.update', $data);
    }

    public function update($id, Request $req)
    {
        $design = Design::find($id);
        $design->title = $req->input('title');
        $design->sub_title = $req->input('sub_title');
        $design->meta = json_encode($req->input('meta'));
        $design->type = json_encode($req->input('type'));
        $design->active = $req->input('active', 'yes');
        $design->category = $req->input('category');
        if ($file = $req->hasFile('image')) {
            $file = $req->file('image');
            $fileName = time() . '.' . $req->file->extension();
            $destinationPath = public_path() . '/design_image/';
            $file->move($destinationPath, $fileName);
            $design->image = $fileName;
        }

        $design->save();

        return redirect()->route('design');
    }

    public function delete($id)
    {
         Db::table('design')->where('id','=',$id)->delete();

        return redirect()->back();
    }
}