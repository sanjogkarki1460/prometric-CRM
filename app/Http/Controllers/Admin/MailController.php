<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PrometricMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use Session;
use DOMDocument;

class MailController extends Controller
{
    protected $enquiry = null;
    protected $applicant = null;

    public function __construct(Enquiry $enquiry,Applicant $applicant)
    {
        $this->enquiry = $enquiry;
        $this->applicant = $applicant;
    }

    public function Enquiry()
    {
        $enquiry = $this->enquiry->get();
        return view('Admin.Mail.EnquiryMail')->with('enquiry', $enquiry);
    }

    public function Applicant()
    {
        $applicant=$this->applicant->get();
        return view('Admin.Mail.ApplicantMail')->with('applicant',$applicant);
    }

    public function SendMail(Request $request)
    {
//        dd($request->all());
        if (empty($request->email)) {
            session::flash('Error', 'please Select receiver');
            return redirect()->back();

        }
        if (empty($request->message)) {
            session::flash('Error', 'please Write message');
            return redirect()->back();

        }
        $objDemo = new \stdClass();
        $objDemo->receiver = $request->email;
        $objDemo->message = $request->message;
        foreach ($objDemo->receiver as $item)
        {
        Mail::to($objDemo->receiver)->send(new PrometricMail($objDemo));
        }
        return redirect()->route('admin.home')->with('success', 'mail Sent');
    }
}

