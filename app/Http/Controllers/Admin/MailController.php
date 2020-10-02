<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PrometricMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Admin\Category;
use Session;
use DOMDocument;

class MailController extends Controller
{
    protected $enquiry = null;
    protected $applicant = null;
    protected $category = null;

    public function __construct(Enquiry $enquiry,Applicant $applicant,Category $category)
    {
        $this->enquiry = $enquiry;
        $this->applicant = $applicant;
        $this->category = $category;
    }

    public function Enquiry(Request $request)
    {
        if($request->id){
            $id=$request->id;
        }
        $query=$this->enquiry->get();
        if(isset($request->category)){
            $query = $query->where('Category_id',$request->category);
        }
        if(isset($request->color_code)){
            $query = $query->where('color_code',$request->color_code);
        }
        if(isset($request->eligibility)){
            $query = $query->where('eligibility',$request->eligibility);
        }
        $enquiry=$query;
        $category = $this->category->get();
        if($request->id) {
            return view('Admin.Mail.EnquiryMail')->with('enquiry', $enquiry)->with('category', $category)
                ->with('id',$id);
        }
        else{
            return view('Admin.Mail.EnquiryMail')->with('enquiry', $enquiry)->with('category', $category);
        }
    }

    public function Applicant(Request $request)
    {
        if($request->id){
            $id=$request->id;
        }
        $query=$this->applicant->get();
        if(isset($request->category)){
            $query = $query->where('applicant_category',$request->category);
        }
        if(isset($request->color_code)){
            $query = $query->where('color_code',$request->color_code);
        }
        if(isset($request->status)){
            $query = $query->where('status',$request->status);
        }
        $applicant=$query;
        $category = $this->category->get();
        if($request->id) {
            return view('Admin.Mail.ApplicantMail')->with('applicant',$applicant)->with('category', $category)
                ->with('id',$id);
        }
        else{
            return view('Admin.Mail.ApplicantMail')->with('applicant',$applicant)->with('category', $category);
        }
    }

    public function SendMail(Request $request)
    {
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

