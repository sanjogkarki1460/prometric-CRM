<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Admin\SMS;

class HomeController extends Controller
{
    protected $applicant = null;
    protected $enquiry = null;
    protected $sms = null;

    public function __construct(Applicant $applicant, Enquiry $enquiry, SMS $sms)
    {
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
        $this->sms = $sms;
    }
    public function index(){
        $month=date('m');
        $enquiry = count($this->enquiry->get());
        $applicant = count($this->applicant->get());
        $applicantthismonth=count($this->applicant->whereMonth('created_at',$month)->get());
        $enquirythismonth=count($this->enquiry->whereMonth('created_at',$month)->get());
        $enquirySMS=count($this->sms->where('user_type','Enquiry')->get());
        $applicantSMS=count($this->sms->where('user_type','Applicant')->get());
        return view('Admin.Home')->with('enquiry',$enquiry)->with('applicant',$applicant)
            ->with('applicantSMS',$applicantSMS)->with('enquirySMS',$enquirySMS)
            ->with('applicantthismonth',$applicantthismonth)->with('enquirythismonth',$enquirythismonth);

    }
}
