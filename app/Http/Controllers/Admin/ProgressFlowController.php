<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\ProgressFlow;
use App\Admin\Applicant;
use File;

class ProgressFlowController extends Controller
{
    protected $progressflow = null;
    protected $applicant = null;

    public function __construct(ProgressFlow $progressFlow, Applicant $applicant)
    {
        $this->applicant = $applicant;
        $this->progressflow = $progressFlow;
    }

    public function index()
    {
        $progressflow = $this->progressflow->get();
        return view('Admin.Applicant.Progress Flow.Index')->with('progressflow', $progressflow);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant = $this->applicant->get();
        return view('Admin.Applicant.Progress Flow.Add')->with('applicant', $applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->progressflow->fill($data);
        $success = $this->progressflow->save();
        if ($request->signed_docs) {
            $first_Name=$this->progressflow->Applicant_ProgressFlow->first_name;
            $middel_Name=$this->progressflow->Applicant_ProgressFlow->middel_name;
            $last_Name=$this->progressflow->Applicant_ProgressFlow->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
//            dd($name);
            $path = public_path() . '/upload/Applicant/Progress flow';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-signed_docs-" . date('Ymdhid') . rand(0, 99) . "." . $request->signed_docs->getClientOriginalExtension();
            $success = $request->signed_docs->move($path, $file_name);

            if ($success) {
                $data['signed_docs'] = $file_name;
            } else {
                $data['signed_docs'] = null;
            }
        }
        $this->progressflow->fill($data);
        $success = $this->progressflow->save();
        if ($success) {
            return redirect()->route('ProgressFlow.index')->with('success', 'Applicant Progress Flow Added Successfully');
        } else {
            return redirect()->route('ProgressFlow.index')->with('Error', 'Sorry! There is an error adding progress flow detail list');
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
        $progressflow = $this->progressflow->find($id);
        $applicant = $this->applicant->get();
        $app = $progressflow->Applicant_ProgressFlow->first_name;
        return view('Admin.Applicant.Progress Flow.Update')->with('applicant', $applicant)->with('progressflow', $progressflow)
            ->with('app', $app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $progressflow = $this->progressflow->find($id);
        $data = $request->all();
        if ($request->signed_docs) {
            $first_Name=$progressflow->Applicant_ProgressFlow->first_name;
            $middel_Name=$progressflow->Applicant_ProgressFlow->middel_name;
            $last_Name=$progressflow->Applicant_ProgressFlow->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
//            dd($name);
            $signed_docs = public_path() . '/upload/Applicant/Progress flow/' . $progressflow->signed_docs;
            if (File::exists($signed_docs)) {
                $delete = File::delete($signed_docs);
            }
            $path = public_path() . '/upload/Applicant/Progress flow';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-signed_docs-" . date('Ymdhid') . rand(0, 99) . "." . $request->signed_docs->getClientOriginalExtension();
            $success = $request->signed_docs->move($path, $file_name);

            if ($success) {
                $data['signed_docs'] = $file_name;
            } else {
                $data['signed_docs'] = null;
            }

        }
        $progressflow->fill($data);
        $success = $progressflow->save();
        if ($success) {
            return redirect()->route('ProgressFlow.index')->with('success', 'Applicant Progress Flow updated Successfully');
        } else {
            return redirect()->route('ProgressFlow.index')->with('Error', 'Sorry! There is an error updating progress flow detail list');
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
        $progressflow = $this->progressflow->find($id);
//        dd($progressflow);
        if (!$progressflow) {
            return redirect()->route()->with('Error', 'Applicant progressflow list not found');
        }
        $signed_docs = public_path() . '/upload/Applicant/Progress flow/' . $progressflow->signed_docs;
        if (File::exists($signed_docs)) {
            $delete = File::delete($signed_docs);
        }
        $success = $progressflow->delete();
        if ($success) {
            return redirect()->route('ProgressFlow.index')->with('success', 'Applicant ProgressFlow Deleted Successfully');
        }
        {
            return redirect()->route('ProgressFlow.index')->with('Error', 'Sorry! There is an error deleting applicant progressflow list');
        }
    }
}
