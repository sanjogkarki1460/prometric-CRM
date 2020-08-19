<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AppointmentProvider;
use App\Mail\AppointmentReceiver;
use Illuminate\Http\Request;
use App\Admin\EnquiryAppointment;
use App\Admin\Enquiry;
use App\Admin\Admin;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EnquiryAppointmentValidator;
use Auth;


class EnquiryAppointmentController extends Controller
{
    protected $enquiryappointment = null;
    protected $Enquiry = null;
    protected $admin= null;

    public function __construct(EnquiryAppointment $enquiryappointment, Enquiry $enquiry,Admin $admin)
    {
        $this->enquiryappointment = $enquiryappointment;
        $this->enquiry = $enquiry;
        $this->admin= $admin;
    }

    public function index()
    {
        $user=Auth::user()->id;
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
        $admin=$this->admin->get();
        $enquiry=$this->enquiry->orderBy('id','desc')->get();
        return view('Admin.Appointment.Enquiry Appointment.Add')->with('enquiry',$enquiry)->with('admin',$admin);
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
        $provider=$this->admin->find($request->appointment_with);
        $providermail=$provider->email;
        $enquiry=$this->enquiry->find($request->enquiry_id);
        $enquirymail=$enquiry->email;
        $this->enquiryappointment->fill($data);
        $success=$this->enquiryappointment->save();
        if($success){
            $objDemo = new \stdClass();
            $objDemo->provider = $provider->name;
            $objDemo->receiver = $enquiry->first_name.' '.$enquiry->middle_name.' '.$enquiry->last_name ;
            $objDemo->date = $request->date;
            $objDemo->time = date('h:i A',strtotime($request->time));
            Mail::to($providermail)->send(new AppointmentProvider($objDemo));
            Mail::to($enquirymail)->send(new AppointmentReceiver($objDemo));
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot update appointment by yourself');
        }
        $appointment=$this->enquiryappointment->find($id);
        if(!$appointment){
            return redirect()->route('EnquiryAppointment.index')->with('Error','No Appointment Found');
        }
        $admin=$this->admin->get();
        $app=$appointment->Enquiry_Appointment->first_name;
        $ad=$appointment->Enquiry_Admin->name;
        $enquiry=$this->enquiry->orderBy('id','desc')->get();
        return view('Admin.Appointment.Enquiry Appointment.Update')->with('appointment',$appointment)
            ->with('enquiry',$enquiry)->with('app',$app)->with('admin',$admin)->with('ad',$ad);
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot update appointment by yourself');
        }
        $data=$request->all();
        $appointment=$this->enquiryappointment->find($id);
        $provider=$this->admin->find($request->appointment_with);
        $providermail=$provider->email;
        $enquiry=$this->enquiry->find($request->enquiry_id);
        $enquirymail=$enquiry->email;
        $appointment->fill($data);
        $success=$appointment->save();
        if($success){
            $objDemo = new \stdClass();
            $objDemo->provider = $provider->name;
            $objDemo->receiver = $enquiry->first_name.' '.$enquiry->middle_name.' '.$enquiry->last_name ;
            $objDemo->date = $request->date;
            $objDemo->time = date('h:i A',strtotime($request->time));
            Mail::to($providermail)->send(new AppointmentProvider($objDemo));
            Mail::to($enquirymail)->send(new AppointmentReceiver($objDemo));
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry! You Cannot update appointment by yourself');
        }
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
