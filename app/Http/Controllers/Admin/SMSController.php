<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Admin\SMS;


class SMSController extends Controller
{
    protected $applicant=null;
    protected $enquiry=null;
    protected $sms=null;

    public function __construct(Applicant $applicant,Enquiry $enquiry,SMS $sms)
    {
        $this->applicant=$applicant;
        $this->enquiry=$enquiry;
        $this->sms=$sms;
    }


    public function EnquirySMS(){
        $enquiry=$this->enquiry->get();
        return view('Admin.SMS.enquirysms')->with('enquiry',$enquiry);

    }

    public function ApplicantSMS(){
        $applicant=$this->applicant->get();
        return view('Admin.SMS.applicantsms')->with('applicant',$applicant);
    }

    public function SendSMS(Request $request){

    }
}
