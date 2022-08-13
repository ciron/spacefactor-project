<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Design\Design;
use App\Models\Project\Project;
use DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\StyleGuideImage;
use App\Models\Questions;


/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {

        return view('frontend.contact');
    }
    
    /**
     * @return View
     */
    public function quiz()
    {
        $data['pageTitle'] = 'Whats Your Home Design Style? Take The Space factor Style Quiz!';
        $data['pageDesc'] = 'Try Our Fast, Free & Fun Interior Design Style Quiz To Help You Uncover Your Design Tastes So You Can Get Down To The Fun Part Of Creating a Home You ll Love.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend.page.quiz', $data);
    }
    
    /**
     * @return View
     */
    public function takeQuiz(Request $request)
    {
        $questions = Questions::with('options')->get();
        return view('frontend.page.take-quiz')->withQuestions($questions);
    }

    /**
     * @return Redirect
     */
    public function StoreTakeQuiz(Request $request)
    {
        //dd($request->first_name);
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);
        //\App\Models\Quiz::create(['first_name' => $validated['first_name'], 'last_name' => $validated['last_name'],'email' => $validated['email']]);
        $userData = array('first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email);
        \App\Models\Quiz::create($userData);
        $options = \App\Models\Options::whereIn('id', array_values($validated['answers']))->get();

        $attribs = [];
        foreach ($options as $key => $option) {
            $attribs = array_merge($attribs, $option->attributes->pluck('name')->toArray());
        }
        $countedAttrib = array_count_values($attribs);
        uasort($countedAttrib, function($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a > $b) ? -1 : 1;
        });
        // dd($countedAttrib);
        $topStyles = array_slice($countedAttrib, 0, 3);
        // dd($topStyles);
        $result = [];
        $total = array_sum(array_values($topStyles));
        foreach ($topStyles as $style => $value) {
            $perc = ($value * 100) / $total;
            $result[] = ['style' => $style, 'percentage' => (int) round($perc, 0)];
        }
        $request->session()->put('quiz_result', $result);
        return redirect()->route('frontend.page.quiz.result');
    }
    
    /**
     * @return View
     */
    public function showQuizResult(Request $request)
    {
        $interest = $request->session()->get('quiz_result', '[]');
        return view('frontend.page.quiz_result')->withInterest($interest);
    }

    /**
     * @return View
     */
    public function trands(Request $request): View
    {

        $data['categories'] = Category::where('category.type', 'TRENDS')->get();

        $data['detail'] = false;
        if ($request->input('detail')) {
            $cat_id = DB::table('category')
                ->where('category.slug', $request->input('detail'))
                ->where('category.type', 'TRENDS')
                ->value('id');
            $data['detail'] = DB::table('design')
                ->where('design.type', 'TRENDS')
                ->where('design.category', $cat_id)->first();


            $data['recent_projects'] = Design::where('design.type', 'TRENDS')->orderBy('created_at', 'desc')->get();
        }

        $data['pageTitle'] = 'Interior Design Trends That Are Going To Rule– Space Factor | Bangladesh';
        $data['pageDesc'] = 'Colour scheme: Will Be the Year Of Grey Tones. A Cool Neutral Colour Scheme Connects Technology And Modernity Into Elegant Spaces.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend..page.trands', $data);
    }

    /**
     * @return View
     */
    public function designService(Request $request): View
    {
        $data['categories'] = Category::where('category.type', '=', 'DESIGN_SERVICE')->get();

        $data['detail'] = false;
        if ($request->input('detail')) {
            $cat_id = DB::table('category')
                ->orderBy('id','DESC')
                ->where('category.slug', $request->input('detail'))
                ->where('category.type', '=', 'DESIGN_SERVICE')
                ->value('id');

            $data['detail'] = DB::table('design')
                ->where('design.type', '=', 'DESIGN_SERVICE')
                ->where('design.category', $cat_id)->get();
            $data['catdetail'] = Category::where('category.slug', $request->input('detail'))
                ->where('category.type', '=', 'DESIGN_SERVICE')->first();
            //echo "<pre>"; print_r(json_decode(json_encode($data['catdetail']),true)); die;

            $data['recent_projects'] = Project::where('design_service', '=', $data['detail']->first()->category)->orderBy('created_at', 'desc')
                ->get();
        }

        $pageTitle = $pageDesc = '';
        if( $request->input('detail') && $request->input('detail') == "residential" ){
            $pageTitle = 'Home interior | Kitchen design company in Bangladesh';
            $pageDesc = 'Space factor design\'s  Interior architects helps you from conceptual design to Interior styling.';
            

        }else if( $request->input('detail') && $request->input('detail') == "corporate" ){
            $pageTitle = 'Office Interior Design Company | Space Factor Design';
            $pageDesc = 'Our interior architect will help you to define contemporary style which makes your corporate office a great place to work';
        }else if( $request->input('detail') && $request->input('detail') == "cafeteria" ){
            $pageTitle = 'Restaurant design |  Interior design company in Dhaka';
            $pageDesc = 'Our Interior designers guides you to remold your cafeteria/  Restaurant from location selection to final layout.';
        }else if( $request->input('detail') && $request->input('detail') == "landscaping" ){
            $pageTitle = 'Landscape Design  | Space Factor Design';
            $pageDesc = 'Get in touch with best Landscape design company to give your  Residential and Commercial  space a modern and beautiful look';
        }else if( $request->input('detail') && $request->input('detail') == "parametric-design" ){
            $pageTitle = 'Interior designer in Bangladesh | Parametric design';
            $pageDesc = 'Space Factor design provides the quality parametric designs to its clients.';
        }else if( $request->input('detail') && $request->input('detail') == "duplex-design" ){
            $pageTitle = 'Duplex house plans |  home Interior design company in Dhaka';
            $pageDesc = 'Space Factor design is one of the top firm to provide duplex home interior services in Bangladesh';
        }else if( $request->input('detail') && $request->input('detail') == "retail-showroom" ){
            $pageTitle = 'Interior design company in Dhaka | Retail Showroom Services';
            $pageDesc = 'Space factor design is the top product design company to provide services in transformation of retail showrooms';
        }else if( $request->input('detail') && $request->input('detail') == "furniture-design-5e86a4e0ab1a6" ){
            $pageTitle = 'Furniture design | Interior design company in Dhaka';
            $pageDesc = 'Get the desired furniture designs for home or workplace from best Interior designer in Bangladesh';
        }
        $data['pageTitle'] = 'Interior Design Services | Interior Designing Company| Bangladesh';
        $data['pageDesc'] = 'We Are a Premium Interior Planning, Designing, And Execution Company. Please Visit Our Website To Know More About Our Interior Design Services.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';

        return view('frontend.page.design_service', $data);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function projects(Request $request): View
    {
        $data['categories'] = Category::where('category.type', '=', 'PROJECT')->get();

        $data['projectInfo'] = false;
        if ($request->input('slug')) {
            $data['projectInfo'] = Project::
                where('projects.slug', $request->input('slug'))
                ->first();
            $data['recent_projects'] = Project::orderBy('created_at', 'desc')->get();
        }
        $catId = $request->input('catId');

        $data['projects'] = Project::when($catId, static function($query) use ($catId) {
            return $query->where('projects.category', $catId);
        })->orderBy('projects.id')
            ->select([ 'projects.slug', 'category.cat_name', 'category.cat_image'])
            ->join('category', 'category.id', '=', 'projects.category')
            ->paginate();
            
        // $galleryArr = [];
        // foreach($data['projects'] as $project){
        //     $slug = $project->slug;
        //     $projectInfo = Project::where('projects.slug', $slug)->first();
        //     if (!empty($projectInfo)) {
        //         $jsonArr = json_decode($projectInfo->gallery, true);
        //         if(!empty($jsonArr)){
        //             foreach($jsonArr as $imgId => $img ){
        //                 $galleryArr[$slug][] = $img;
        //             }
        //         }
        //     }
            
        // }

        // $data['galleryArr'] = $galleryArr;
        
        $data['pageTitle'] = 'Projects | Modern Interior Design Ideas & Tips | Space factors | Bangladesh';
        $data['pageDesc'] = 'Our Design Experts Bring You The Latest Modern Interior Design Ideas And Tips To Change The Way You Design Interior Spaces.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend.page.projects', $data);
    }

    /**
     * @return View
     */
    public function about(): View
    {
        $data['categories'] = Category::where('category.type', '=', 'DESIGN_SERVICE')->get();
        $data['pageTitle'] = 'Space Factor interior Design Company in Bangladesh | Interior Designers';
        $data['pageDesc'] = 'Our Commitment. We Are Committed To Delivering Inspired Designs That Fulfil Client Expectations Through Collaboration And Exceptional Service. ';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend..page.about',$data);
    }

    /**
     * @return View
     */
    public function moodBoard(Request $request): View

    {
        $data['categories'] = Category::where('category.type', 'MOODBOARD')->get();

        $data['detail'] = false;
        if ($request->input('detail')) {
            $cat_id = DB::table('category')
                ->where('category.slug', $request->input('detail'))
                ->where('category.type', 'MOODBOARD')
                ->value('id');
            $data['detail'] = DB::table('design')
                ->where('design.type', 'MOODBOARD')
                ->where('design.category', $cat_id)->first();


            $data['recent_projects'] = Design::where('design.type', 'MOODBOARD')->orderBy('created_at', 'desc')->get();
        }
        $data['pageTitle'] = 'Build Your Dream Interior Design Mood board | Space factor | Bangladesh';
        $data['pageDesc'] = 'What is a Mood board? ... A mood Board Is a Board—Physical or Digital—Where You Can Collect Imagery That Inspires You.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend..page.mood_board', $data);
    }


    public function styleGuide(Request $request): View

    {
        $data['categories'] = Category::where('category.type', 'MOODBOARD')->get();
        $data['detail'] = false;
        if ($request->input('detail')) {
            $cat_id = DB::table('category')
                ->where('category.slug', $request->input('detail'))
                ->where('category.type', 'MOODBOARD')
                ->value('id');
            $data['detail'] = DB::table('design')
                ->where('design.type', 'MOODBOARD')
                ->where('design.category', $cat_id)->first();


            $data['recent_projects'] = Design::where('design.type', 'MOODBOARD')->orderBy('created_at', 'desc')->get();
        }
       // dd($data);
        $data['pageTitle'] = 'Interior Design Styles: Most Popular Types Explained | Space Factor';
        $data['pageDesc'] = 'Discover Most Of The Popular Interior Design Styles You Need To Know And Explanations Of Each, From Space Factor Interior Designer Company.';
         $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend..page.style_guide', $data);
    }
        
    public function getStyleImages(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $appendimages = '';
            $images = StyleGuideImage::where('style_guide_id',$data['styleid'])->get();
          
            foreach($images as $ikey=> $image){
                $appendimages .='<div class="mySlides">
                                  <div class="numbertext">'.++$ikey.' / '.count($images).'</div>
                                  <img src="'.asset('img/frontend/homepage/projects/'.$image->image).'" class="img-fluid">
                                </div>';
            }
            
            return $appendimages;
        }
    }

    public function blog(){
        return view('frontend..page.blog');
    }
    
    public function attribDescription($keyword)
    {
        $attrib_desc = \App\Models\Attribute::where('name','LIKE','%'.$keyword.'%')->first();
        if (!$attrib_desc) {
                return response()->json(['status'=>404, 'description'=>'Not found']);
        }
        return response()->json(['status'=>200, 'description'=> $attrib_desc->description]);
    }
}
