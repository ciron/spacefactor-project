<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Contact\SendContactRequest;
use App\Mail\Frontend\Contact\SendContact;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['categories'] = Category::where('category.type', '=', 'DESIGN_SERVICE')->get();
        $data['pageTitle'] = ' Space factor Interior Design Customer Services | Bangladesh| Perfect Interior Designs';
        $data['pageDesc'] = 'You Can File Your Request Easily Related With Interior Design Works And Queries By Filling Up Provided Form. We Assure You To Support The Best At The Earliest.';
        return view('frontend.contact',$data);
    }

    /**
     * @param SendContactRequest $request
     *
     * @return mixed
     */
    public function send(SendContactRequest $request)
    {
        Mail::send(new SendContact($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.contact.sent'));
    }
}
