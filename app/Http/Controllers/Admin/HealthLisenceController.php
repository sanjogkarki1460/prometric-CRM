<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\HealthLisence;
use App\Http\Requests\HealthLisencevalidator;
use File;

class HealthLisenceController extends Controller
{
    protected $applicant=null;
    protected $healthlisence=null;

    public function __construct(Applicant $appliant,HealthLisence $healthLisence)
    {
        $this->applicant=$appliant;
        $this->healthlisence=$healthLisence;
    }

    public function index()
    {
        $healthlisence=$this->healthlisence->get();
        return view('Admin.Applicant.HealthLisence.Index')->with('healthlisence',$healthlisence);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant=$this->applicant->get();
        return view('Admin.Applicant.HealthLisence.Add')->with('applicant',$applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthLisencevalidator $request)
    {
        $data=$request->all();
        if ($request->license_copy) {
            $path = public_path() . '/upload/Applicant/Health Lisence';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = "HealthLisence-" . date('Ymdhid') . rand(0, 99) . "." . $request->license_copy->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->license_copy->move($path, $file_name);

            if ($success) {
                $data['license_copy'] = $file_name;
            } else {
                $data['license_copy'] = null;
            }
        }
        $this->healthlisence->fill($data);
        $success=$this->healthlisence->save();
        if($success){
            return redirect()->route('HealthLisence.index')->with('success','Health Lisence list Added successfully');
        }
        else{
            return redirect()->route('HealthLisence.index')->with('Error','Sorry! there is an arror adding health lisence list');
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
            $healthlisence=$this->healthlisence->find($id);
        $applicant=$this->applicant->get();
        $app=$healthlisence->applicant_id;
        return view('Admin.Applicant.HealthLisence.Update')->with('healthlisence',$healthlisence)->with('applicant',$applicant)
            ->with('app',$app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $healthlisence=$this->healthlisence->find($id);
        $data=$request->all();
        if ($request->license_copy) {
            $image_path = public_path() . '/upload/Applicant/Health Lisence/' . $healthlisence->license_copy;
//        dd($image_path);
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
//            dd($delete);
            }
            $path = public_path() . '/upload/Applicant/Health Lisence';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = "HealthLisence-" . date('Ymdhid') . rand(0, 99) . "." . $request->license_copy->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->license_copy->move($path, $file_name);

            if ($success) {
                $data['license_copy'] = $file_name;
            } else {
                $data['license_copy'] = null;
            }
        }
        $healthlisence->fill($data);
        $success=$healthlisence->save();
        if($success){
            return redirect()->route('HealthLisence.index')->with('success','Health Lisence list updateed successfully');
        }
        else{
            return redirect()->route('HealthLisence.index')->with('Error','Sorry! there is an arror updating health lisence list');
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
        $healthlisence = $this->healthlisence->find($id);
        if (!$healthlisence) {
            return redirect()->back()->with('Error', 'List Not Found');
        }
        $image_path = public_path() . '/upload/Applicant/Health Lisence/' . $healthlisence->license_copy;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $success = $healthlisence->delete();
        if ($success) {
            return redirect()->route('HealthLisence.index')->with('success', 'List Deleted Successfully');
        } else {
            return redirect()->route('HealthLisence.index')->with('Error', 'Sorry! there is an error deleting list');
        }
    }
}
