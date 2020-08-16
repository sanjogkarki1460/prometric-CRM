<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\ApplicantAppointment;
use App\Admin\Applicant;
use App\Http\Requests\ApplicantAppointmentValidator;

class ApplicantAppointmentController extends Controller
{
    protected $applicantappointment=null;
    protected $Applicant=null;

    public function __construct(ApplicantAppointment $applicantappointment,Applicant $applicant)
    {
     $this->applicantappointment=$applicantappointment;
     $this->applicant=$applicant;
    }

    public function index()
    {
        $appointment=$this->applicantappointment->orderBy('id','desc')->get();
        return view('Admin.Appointment.Applicant Appointment.Index')->with('appointment',$appointment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant=$this->applicant->orderBy('id','desc')->get();
        return view('Admin.Appointment.Applicant Appointment.Add')->with('applicant',$applicant);
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
        $this->applicantappointment->fill($data);
        $success=$this->applicantappointment->save();
        if($success){
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
        $appointment=$this->applicantappointment->find($id);
        if(!$appointment){
            return redirect()->route('ApplicantAppointment.index')->with('Error','No Appointment Found');
        }
        $app=$appointment->Applicant_Appointment->first_name;
        $applicant=$this->applicant->orderBy('id','desc')->get();
        return view('Admin.Appointment.Applicant Appointment.Update')->with('appointment',$appointment)
            ->with('applicant',$applicant)->with('app',$app);
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
        $data=$request->all();
        $appointment=$this->applicantappointment->find($id);
        $appointment->fill($data);
        $success=$appointment->save();
        if($success){
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
