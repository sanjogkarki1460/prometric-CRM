<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Admin\SMS;
use Thebikramlama\Sparrow\Sparrow;
use Illuminate\Support\Facades\Session;


class SMSController extends Controller
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


    public function EnquirySMS()
    {
        $enquiry = $this->enquiry->get();
        return view('Admin.SMS.enquirysms')->with('enquiry', $enquiry);

    }

    public function ApplicantSMS()
    {
        $applicant = $this->applicant->get();
        return view('Admin.SMS.applicantsms')->with('applicant', $applicant);
    }

    public function SendSMS(Request $request)
    {
        $data = $request->all();
        if (empty($request->phone_number)) {
            session::flash('Error', 'please Select receiver');
            return redirect()->back();

        }
        if (empty($request->message)) {
            session::flash('Error', 'please Write message');
            return redirect()->back();

        }
            foreach ($request->phone_number as $item => $v)
                SMS::create([
                    'user_type' => $request->user_type,
                    'message' => $request->message,
                    'phone_number' => $request->phone_number[$item],
                ]);
        $number = array();
        foreach ($request->phone_number as $phone_number) {

            $value = (int)$phone_number + 0;
            array_push($number, $value);

        }
        $phnumber = implode(',', $number);
        $message = $request->message;
        $from = 'Prometric Exam Nepal';
        $access_token = 'TyUrCzwHXbobGHofD57o';
        $to = $phnumber;
        $message = $message;
        $sms_message = Sparrow::send($to, $message, $from, $access_token);
        if ($sms_message) {
            session::flash('success', 'Message Sent');
        } else
            session::flash('error', 'Message not sent');
        return redirect('/admin');
    }
}
