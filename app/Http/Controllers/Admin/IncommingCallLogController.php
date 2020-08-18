<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\IncommingCallLog;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\IncommingCallLogValidator;
use Auth;

class IncommingCallLogController extends Controller
{
    protected $incommingcalllog = null;
    protected $applicnat = null;
    protected $enquiry = null;

    public function __construct(IncommingCallLog $incommingcalllog, Applicant $applicant, Enquiry $enquiry)
    {
        $this->incommingcalllog = $incommingcalllog;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
    }

    public function index()
    {
        $call = $this->incommingcalllog->get();
        return view('Admin.Call Log.Incomming Call Log.Index')->with('call', $call);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant = $this->applicant->get();
        $enquiry = $this->enquiry->get();
        return view('Admin.Call Log.Incomming Call Log.Add')->with('applicant', $applicant)->with('enquiry', $enquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncommingCallLogValidator $request)
    {
        $data = $request->all();
        if($request->applicant_id && $request->enquiry_id)
        {
            return redirect()->route('IncomingCallLog.create')->with('Error', 'Please choose either Applicant or Enquiry');
        }
        $this->incommingcalllog->fill($data);
        $success = $this->incommingcalllog->save();
        if ($success) {
            return redirect()->route('IncomingCallLog.index')->with('success', 'Incomming call record added successfully');
        } else {
            return redirect()->route('IncomingCallLog.index')->with('Error', 'Sorry! There was and error adding incomming call record');
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
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $calllog=$this->incommingcalllog->find($id);
        if(!$calllog){
            return redirect()->route('IncomingCallLog.index')->with('Error','No call log Found');
        }
        if($calllog->applicant_id){
            $app=$calllog->Applicant_Incomming->first_name;

        }
        elseif($calllog->enquiry_id){
            $app=$calllog->Enquiry_Incomming->first_name;
        }
        $applicant = $this->applicant->get();
        $enquiry = $this->enquiry->get();

        return view('Admin.Call Log.Incomming Call Log.Update')->with('applicant', $applicant)->with('enquiry', $enquiry)
            ->with('app',$app)->with('calllog',$calllog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(IncommingCallLogValidator $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $calllog=$this->incommingcalllog->find($id);
        if(!$calllog){
            return redirect()->route('IncomingCallLog.index')->with('Error','No call log Found');
        }
        $data = $request->all();
        if($request->applicant_id && $request->enquiry_id)
        {
            return redirect()->route('IncomingCallLog.edit')->with('Error', 'Please choose either Applicant or Enquiry');
        }
        $calllog->fill($data);
        $success = $calllog->save();
        if ($success) {
            return redirect()->route('IncomingCallLog.index')->with('success', 'Incomming call record updated successfully');
        } else {
            return redirect()->route('IncomingCallLog.index')->with('Error', 'Sorry! There was and error updating incomming call record');
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
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $calllog=$this->incommingcalllog->find($id);
        if(!$calllog){
            return redirect()->route('IncomingCallLog.index')->with('Error','No call log Found');
        }
        $success=$calllog->delete();
        if($success){
            return redirect()->route('IncomingCallLog.index')->with('success','call log Deleted');
        }
        else{
            return redirect()->route('IncomingCallLog.index')->with('Error','Sorry! There is an error deleting call log');
        }
    }
}
