<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Design\Design;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['categories'] = Category::where('category.type','=', 'DESIGN_SERVICE')->get();
        $data['pageTitle'] = 'Space Factor Interior Design In Bangladesh:: Beyond Your Imagination';
        $data['pageDesc'] = 'Space factor Interior Design In Bangladesh Is One Of The Leading Interior Designing Company in Bangladesh';
        $data['pagekeyword'] = 'Landscape design, Landscape design in Bangladesh, Furniture design in Bangladesh, Furniture design, Furniture design company, Interior designer in Bangladesh, Home interior design Bangladesh, Bangladeshi home interior design, Interior design company in Dhaka, Interior design company in Bangladesh, Office Interior Design Company in Bangladesh, Kitchen design In Bangladesh, Interior designer Interior architect, Restaurant interior design, Home interior design, Landscape design company';
        return view('frontend.index',$data);
    }
}
