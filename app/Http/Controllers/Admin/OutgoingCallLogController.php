<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\OutgoingCallLog;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\OutgoingCallLogValidator;
use Auth;

class OutgoingCallLogController extends Controller
{
    protected $outgoingcalllog = null;
    protected $applicnat = null;
    protected $enquiry = null;

    public function __construct(OutgoingCallLog $outgoingcalllog, Applicant $applicant, Enquiry $enquiry)
    {
        $this->outgoingcalllog = $outgoingcalllog;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
    }

    public function index()
    {
        $call = $this->outgoingcalllog->get();
        return view('Admin.Call Log.Outgoing Call Log.Index')->with('call', $call);
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
        return view('Admin.Call Log.Outgoing Call Log.Add')->with('applicant', $applicant)->with('enquiry', $enquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutgoingCallLogValidator $request)
    {
        $data = $request->all();
        $this->outgoingcalllog->fill($data);
        $success = $this->outgoingcalllog->save();
        if ($success) {
            return redirect()->route('OutgoingCallLog.index')->with('success', 'Outgoing call record added successfully');
        } else {
            return redirect()->route('OutgoingCallLog.index')->with('Error', 'Sorry! There was and error adding outgoing call record');
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
        $calllog=$this->outgoingcalllog->find($id);
//        dd($calllog);
        if(!$calllog){
            return redirect()->route('OutgoingCallLog.index')->with('Error','No call log Found');
        }
        if($calllog->applicant_id){
            $app=$calllog->Applicant_Outgoing->first_name;

        }
        elseif($calllog->enquiry_id){
            $app=$calllog->Enquiry_Outgoing->first_name;
        }
//        dd($app);
        $applicant = $this->applicant->get();
        $enquiry = $this->enquiry->get();

        return view('Admin.Call Log.Outgoing Call Log.Update')->with('applicant', $applicant)->with('enquiry', $enquiry)
            ->with('app',$app)->with('calllog',$calllog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OutgoingCallLogValidator $request, $id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $calllog=$this->outgoingcalllog->find($id);
        if(!$calllog){
            return redirect()->route('OutgoingCallLog.index')->with('Error','No call log Found');
        }
        $data = $request->all();
        $calllog->fill($data);
        $success = $calllog->save();
        if ($success) {
            return redirect()->route('OutgoingCallLog.index')->with('success', 'Outgoing call record updated successfully');
        } else {
            return redirect()->route('OutgoingCallLog.index')->with('Error', 'Sorry! There was and error updating outgoing call record');
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
        $calllog=$this->outgoingcalllog->find($id);
        if(!$calllog){
            return redirect()->route('OutgoingCallLog.index')->with('Error','No call log Found');
        }
        $success=$calllog->delete();
        if($success){
            return redirect()->route('OutgoingCallLog.index')->with('success','call log Deleted');
        }
        else{
            return redirect()->route('OutgoingCallLog.index')->with('Error','Sorry! There is an error deleting call log');
        }
    }
}
