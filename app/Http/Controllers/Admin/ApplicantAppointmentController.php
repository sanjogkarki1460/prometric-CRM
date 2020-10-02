<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentProvider;
use App\Mail\AppointmentReceiver;
use Illuminate\Http\Request;
use App\Admin\ApplicantAppointment;
use App\Admin\Applicant;
use App\Http\Requests\ApplicantAppointmentValidator;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\Admin\Admin;



class ApplicantAppointmentController extends Controller
{
    protected $applicantappointment=null;
    protected $Applicant=null;
    protected $admin=null;

    public function __construct(ApplicantAppointment $applicantappointment,Applicant $applicant,Admin $admin)
    {
     $this->applicantappointment=$applicantappointment;
     $this->applicant=$applicant;
     $this->admin=$admin;
    }

    public function index()
    {
        $user = Auth::user()->id;
        if (Auth::user()->role == 'Admin') {
            $appointment = $this->applicantappointment->orderBy('id', 'desc')->get();
        } else {
            $appointment = $this->applicantappointment->where('appointment_with', $user)->orderBy('id', 'desc')->get();
        }
        return view('Admin.Appointment.Applicant Appointment.Index')->with('appointment',$appointment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot add appointment by yourself');
        }
        $admin=$this->admin->get();
        $applicant=$this->applicant->orderBy('id','desc')->get();
        return view('Admin.Appointment.Applicant Appointment.Add')->with('applicant',$applicant)->with('admin',$admin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantAppointmentValidator $request)
    {
        $data=$request->all();
//        dd($data);
        $provider=$this->admin->find($request->appointment_with);
        $providermail=$provider->email;
        $applicant=$this->applicant->find($request->applicant_id);
        $applicantmail=$applicant->email;
        $this->applicantappointment->fill($data);
        $success=$this->applicantappointment->save();
        if($success){
            $objDemo = new \stdClass();
            $objDemo->provider = $provider->name;
            $objDemo->receiver = $applicant->first_name.' '.$applicant->middel_name.' '.$applicant->surname ;
            $objDemo->date = $request->date;
            $objDemo->time = date('h:i A',strtotime($request->time));
            Mail::to($providermail)->send(new AppointmentProvider($objDemo));
            Mail::to($applicantmail)->send(new AppointmentReceiver($objDemo));
            return redirect()->route('ApplicantAppointment.index')->with('success','New appointment added');
        }
        else{
            return redirect()->route('ApplicantAppointment.index')->with('Error','Sorry! There is an error adding new appointment');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot add appointment by yourself');
        }
        $appointment=$this->applicantappointment->find($id);
        if(!$appointment){
            return redirect()->route('ApplicantAppointment.index')->with('Error','No Appointment Found');
        }
        $admin=$this->admin->get();
        $ad=$appointment->Applicant_Admin->name;
        $app=$appointment->Applicant_Appointment->first_name;
        $applicant=$this->applicant->orderBy('id','desc')->get();
        return view('Admin.Appointment.Applicant Appointment.Update')->with('appointment',$appointment)
            ->with('applicant',$applicant)->with('app',$app)->with('admin',$admin)->with('ad',$ad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantAppointmentValidator $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot update appointment by yourself');
        }

        $data=$request->all();
        $appointment=$this->applicantappointment->find($id);
        $provider=$this->admin->find($request->appointment_with);
        $providermail=$provider->email;
        $applicant=$this->applicant->find($request->applicant_id);
        $applicantmail=$applicant->email;
        $appointment->fill($data);
        $success=$appointment->save();
        if($success){
            $objDemo = new \stdClass();
            $objDemo->provider = $provider->name;
            $objDemo->receiver = $applicant->first_name.' '.$applicant->middel_name.' '.$applicant->surname ;
            $objDemo->date = $request->date;
            $objDemo->time = date('h:i A',strtotime($request->time));
            Mail::to($providermail)->send(new AppointmentProvider($objDemo));
            Mail::to($applicantmail)->send(new AppointmentReceiver($objDemo));
            return redirect()->route('ApplicantAppointment.index')->with('success','New appointment updated');
        }
        else{
            return redirect()->route('ApplicantAppointment.index')->with('Error','Sorry! There is an error updating new appointment');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot update appointment by yourself');
        }
        $appointment=$this->applicantappointment->find($id);
        if(!$appointment){
            return redirect()->route('ApplicantAppointment.index')->with('Error','No Appointment Found');
        }
        $success=$appointment->delete();
        if($success){
            return redirect()->route('ApplicantAppointment.index')->with('success','Appointment Deleted');
        }
        else{
            return redirect()->route('ApplicantAppointment.index')->with('Error','Sorry! There is an error deleting appointment');
        }

    }
}
