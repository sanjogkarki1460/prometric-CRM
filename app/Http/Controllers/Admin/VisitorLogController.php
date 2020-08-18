<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\VisitorLog;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\VisitorLogValidator;
use Auth;

class VisitorLogController extends Controller
{
    protected $visitorlog=null;
    protected $applicant=null;
    protected $enquiry=null;

    public function __construct(VisitorLog $visitorlog,Applicant $applicant,Enquiry $enquiry)
    {
        $this->visitorlog=$visitorlog;
        $this->enquiry=$enquiry;
        $this->applicant=$applicant;
    }

    public function index()
    {
        $visitorlog=$this->visitorlog->orderBy('id','desc')->get();
//        dd($visitorlog);
        return view('Admin.Visitor Log.Index')->with('visitorlog',$visitorlog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant=$this->applicant->get();
        $enquiry=$this->enquiry->get();
        return view('Admin.Visitor Log.Add')->with('applicant',$applicant)->with('enquiry',$enquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorLogValidator $request)
    {
        $data=$request->all();
        if($request->applicant_id && $request->enquiry_id)
        {
            return redirect()->route('VisitorLog.create')->with('Error', 'Please choose either Applicant or Enquiry');
        }
        $this->visitorlog->fill($data);
        $success=$this->visitorlog->save();
        if($success){
            return redirect()->route('VisitorLog.index')->with('success','Visitor log added successfully');
        }
        else{
            return redirect()->route('VisitorLog.index')->with('error','Sorry! There is an arror adding visitor log ');
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
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $visitorlog=$this->visitorlog->find($id);
        if(!$visitorlog){
            return redirect()->route('VisitorLog.index')->with('Error','visitor log not found');
        }
        if($visitorlog->applicant_id){
            $app=$visitorlog->Applicant_Visitor->first_name;

        }
        elseif($visitorlog->enquiry_id){
            $app=$visitorlog->Enquiry_Visitor->first_name;
        }
        $applicant = $this->applicant->get();
        $enquiry = $this->enquiry->get();

        return view('Admin.Visitor Log.Update')->with('applicant', $applicant)->with('enquiry', $enquiry)
            ->with('app',$app)->with('visitorlog',$visitorlog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorLogValidator $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $VisitorLog=$this->visitorlog->find($id);
        if(!$VisitorLog){
            return redirect()->route('VisitorLog.index')->with('Error','No Visitor log Found');
        }
        $data = $request->all();
        if($request->applicant_id && $request->enquiry_id)
        {
            return redirect()->route('VisitorLog.edit')->with('Error', 'Please choose either Applicant or Enquiry');
        }
        $VisitorLog->fill($data);
        $success = $VisitorLog->save();
        if ($success) {
            return redirect()->route('VisitorLog.index')->with('success', 'Incomming Visitor record updated successfully');
        } else {
            return redirect()->route('VisitorLog.index')->with('Error', 'Sorry! There was and error updating incomming Visitor record');
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
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $visitorlog=$this->visitorlog->find($id);
        if(!$visitorlog){
            return redirect()->route('VisitorLog.index')->with('Error','visitor log not found');
        }
        $success=$visitorlog->delete();
        if($success){
            return redirect()->route('VisitorLog.index')->with('success','visitor log deleted successfully');
        }
        else{
            return redirect()->route('VisitorLog.index')->with('Error','Sorry! There is and error delting visitor log');
        }
    }
}
