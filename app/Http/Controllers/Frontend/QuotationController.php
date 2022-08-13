<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Http\Requests\Frontend\Contact\SendQuotationRequest;
use App\Mail\Frontend\Contact\SendQuotation;
use Illuminate\Support\Facades\Mail;

/**
 * Class QuotationController.
 */
class QuotationController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.contact');
    }

    /**
     * @param SendQuotationRequest $request
     *
     * @return mixed
     */
    public function send(SendQuotationRequest $request)
    {
        Mail::send(new SendQuotation($request));

        return redirect()->back()->withFlashSuccess(__('alerts.frontend.quotation.sent'));
    }
}
