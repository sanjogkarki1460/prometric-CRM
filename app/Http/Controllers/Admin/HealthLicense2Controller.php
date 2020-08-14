<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\HealthLicense2;
use App\Http\Requests\HealthLisencevalidator;
use File;

class HealthLicense2Controller extends Controller
{
    protected $applicant=null;
    protected $healthlicense2=null;

    public function __construct(Applicant $appliant,HealthLicense2 $healthLicense2)
    {
        $this->applicant=$appliant;
        $this->healthlicense2=$healthLicense2;
    }

    public function index()
    {
        $healthlicense=$this->healthlicense2->get();
        return view('Admin.Applicant.HealthLisence.HealthLicense2.Index')->with('healthlicense',$healthlicense);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant=$this->applicant->get();
        return view('Admin.Applicant.HealthLisence.HealthLicense2.Add')->with('applicant',$applicant);
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
        $this->healthlicense2->fill($data);
        $success=$this->healthlicense2->save();
        if ($request->license_copy) {
            $first_Name=$this->healthlicense2->Applicant_Health2->first_name;
            $middel_Name=$this->healthlicense2->Applicant_Health2->middel_name;
            $last_Name=$this->healthlicense2->Applicant_Health2->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Health License';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-HealthLicense2-" . date('Ymdhid') . rand(0, 99) . "." . $request->license_copy->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->license_copy->move($path, $file_name);

            if ($success) {
                $data['license_copy'] = $file_name;
            } else {
                $data['license_copy'] = null;
            }
        }
        $this->healthlicense2->fill($data);
        $success=$this->healthlicense2->save();
        if($success){
            return redirect()->route('HealthLicense2.index')->with('success','Health License list Added successfully');
        }
        else{
            return redirect()->route('HealthLicense2.index')->with('Error','Sorry! there is an arror adding health lisence list');
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
        $healthlisence=$this->healthlicense2->find($id);
        $applicant=$this->applicant->get();
        $app=$healthlisence->Applicant_Health2->first_name;
        return view('Admin.Applicant.HealthLisence.HealthLicense2.Update')->with('healthlisence',$healthlisence)->with('applicant',$applicant)
            ->with('app',$app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HealthLisencevalidator $request, $id)
    {
        $healthlisence=$this->healthlicense2->find($id);
        $data=$request->all();
        if ($request->license_copy) {
            $first_Name=$healthlisence->Applicant_Health2->first_name;
            $middel_Name=$healthlisence->Applicant_Health2->middel_name;
            $last_Name=$healthlisence->Applicant_Health2->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
//            dd($name);
            $image_path = 'upload/Health License/' . $healthlisence->license_copy;
//        dd($image_path);
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
//            dd($delete);
            }
            $path = 'upload/Health License';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-HealthLicense2-" . date('Ymdhid') . rand(0, 99) . "." . $request->license_copy->getClientOriginalExtension();
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
            return redirect()->route('HealthLicense2.index')->with('success','Health License list updateed successfully');
        }
        else{
            return redirect()->route('HealthLicense2.index')->with('Error','Sorry! there is an arror updating health lisence list');
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
        $healthlisence = $this->healthlicense2->find($id);
        if (!$healthlisence) {
            return redirect()->back()->with('Error', 'List Not Found');
        }
        $image_path = 'upload/Health License/' . $healthlisence->license_copy;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $success = $healthlisence->delete();
        if ($success) {
            return redirect()->route('HealthLicense2.index')->with('success', 'List Deleted Successfully');
        } else {
            return redirect()->route('HealthLicense2.index')->with('Error', 'Sorry! there is an error deleting list');
        }
    }
}
