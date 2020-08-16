<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\EnquiryAppointment;
use App\Admin\Enquiry;
use App\Http\Requests\EnquiryAppointmentValidator;


class EnquiryAppointmentController extends Controller
{
    protected $enquiryappointment = null;
    protected $Enquiry = null;

    public function __construct(EnquiryAppointment $enquiryappointment, Enquiry $enquiry)
    {
        $this->enquiryappointment = $enquiryappointment;
        $this->enquiry = $enquiry;
    }

    public function index()
    {
        $appointment=$this->enquiryappointment->orderBy('id','desc')->get();
        return view('Admin.Appointment.Enquiry Appointment.Index')->with('appointment',$appointment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enquiry=$this->enquiry->orderBy('id','desc')->get();
        return view('Admin.Appointment.Enquiry Appointment.Add')->with('enquiry',$enquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnquiryAppointmentValidator $request)
    {
        $data=$request->all();
//        dd($data);
        $this->enquiryappointment->fill($data);
        $success=$this->enquiryappointment->save();
        if($success){
            return redirect()->route('EnquiryAppointment.index')->with('success','New appointment added');
        }
        else{
            return redirect()->route('EnquiryAppointment.index')->with('Error','Sorry! There is an error adding new appointment');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment=$this->enquiryappointment->find($id);
        if(!$appointment){
            return redirect()->route('EnquiryAppointment.index')->with('Error','No Appointment Found');
        }
        $app=$appointment->Enquiry_Appointment->first_name;
        $enquiry=$this->enquiry->orderBy('id','desc')->get();
        return view('Admin.Appointment.Enquiry Appointment.Update')->with('appointment',$appointment)
            ->with('enquiry',$enquiry)->with('app',$app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnquiryAppointmentValidator $request, $id)
    {
        $data=$request->all();
        $appointment=$this->enquiryappointment->find($id);
        $appointment->fill($data);
        $success=$appointment->save();
        if($success){
            return redirect()->route('EnquiryAppointment.index')->with('success','New appointment updated');
        }
        else{
            return redirect()->route('EnquiryAppointment.index')->with('Error','Sorry! There is an error updating new appointment');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment=$this->enquiryappointment->find($id);
        if(!$appointment){
            return redirect()->route('EnquiryAppointment.index')->with('Error','No Appointment Found');
        }
        $success=$appointment->delete();
        if($success){
            return redirect()->route('EnquiryAppointment.index')->with('success','Appointment Deleted');
        }
        else{
            return redirect()->route('EnquiryAppointment.index')->with('Error','Sorry! There is an error deleting appointment');
        }
    }
}
