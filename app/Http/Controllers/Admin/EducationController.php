<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Education;
use App\Http\Requests\Educationvalidator;
use App\Admin\Applicant;
use File;

class EducationController extends Controller
{
    protected $education = null;
    protected $applicant = null;

    public function __construct(Education $education, Applicant $applicant)
    {
        $this->education = $education;
        $this->applicant = $applicant;
    }

    public function index()
    {
        $education = $this->education->get();
        return view('Admin.Applicant.Education.index')->with('education', $education);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant = $this->applicant->get();
//        dd($applicant);
        return view('Admin.Applicant.Education.Add')->with('applicant', $applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Educationvalidator $request)
    {
        $data = $request->all();
        $this->education->fill($data);
        $success=$this->education->save();

        if ($request->qualification_certificate) {
            $first_Name=$this->education->Applicant_Education->first_name;
            $middel_Name=$this->education->Applicant_Education->middel_name;
            $last_Name=$this->education->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = public_path() . '/upload/Applicant/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name.'-Qualification Certificate-'. date('Ymdhid') . rand(0, 99) . "." . $request->qualification_certificate->getClientOriginalExtension();
//            dd($file_name);
            $success = $request->qualification_certificate->move($path, $file_name);

            if ($success) {
                $data['qualification_certificate'] = $file_name;
            } else {
                $data['qualification_certificate'] = null;
            }
        }
        /*Marksheet*/
        if ($request->marksheet) {
            $first_Name=$this->education->Applicant_Education->first_name;
            $middel_Name=$this->education->Applicant_Education->middel_name;
            $last_Name=$this->education->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = public_path() . '/upload/Applicant/Education';
//            dd($path);
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-marksheet-" . date('Ymdhid') . rand(0, 99) . "." . $request->marksheet->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->marksheet->move($path, $file_name);

            if ($success) {
                $data['marksheet'] = $file_name;
            } else {
                $data['marksheet'] = null;
            }

        }
        $this->education->fill($data);
        $success=$this->education->save();
        if($success){
            return redirect()->route('Education.index')->with('success','Applicant Education Added Successfully');
        }
        else{
            return redirect()->route('Education.index')->with('Error','Sorry! There is an error adding applicant education list');
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
        $education=$this->education->find($id);
        $applicant = $this->applicant->get();
        $app=$education->Applicant_Education->first_name;
//        dd($app);
        return view('Admin.Applicant.Education.Update')->with('applicant', $applicant)->with('education',$education)
            ->with('app',$app);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Educationvalidator $request, $id)
    {
        $this->education = $this->education->find($id);
        $data = $request->all();
//        dd($data);
        /*Qualification Certificate*/
        if ($request->qualification_certificate) {
            $first_name=$this->education->Applicant_Education->first_name;
            $middel_name=$this->education->Applicant_Education->middel_name;
            $surname=$this->education->Applicant_Education->surname;
            $name=$name=$first_name.' '.$middel_name.' '.$surname;
            $qualification_certificate = public_path() . '/upload/Applicant/Education/'.$this->education->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $path = public_path() . '/upload/Applicant/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-qualification_certificate-" . date('Ymdhid') . rand(0, 99) . "." . $request->qualification_certificate->getClientOriginalExtension();
            $success = $request->qualification_certificate->move($path, $file_name);

            if ($success) {
                $data['qualification_certificate'] = $file_name;
            } else {
                $data['qualification_certificate'] = null;
            }

        }
        /*Marksheet*/
        if ($request->marksheet) {
            $first_name=$this->education->Applicant_Education->first_name;
            $middel_name=$this->education->Applicant_Education->middel_name;
            $surname=$this->education->Applicant_Education->surname;
            $name=$name=$first_name.' '.$middel_name.' '.$surname;
            $marksheet = public_path() . '/upload/Applicant/Education/'.$this->education->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $path = public_path() . '/upload/Applicant/Education';
//            dd($path);
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-marksheet-" . date('Ymdhid') . rand(0, 99) . "." . $request->marksheet->getClientOriginalExtension();
//
            $success = $request->marksheet->move($path, $file_name);

            if ($success) {
                $data['marksheet'] = $file_name;
            } else {
                $data['marksheet'] = null;
            }

        }
        $this->education->fill($data);
        $success=$this->education->save();
        if($success){
            return redirect()->route('Education.index')->with('success','Applicant Education Updated Successfully');
        }
        else{
            return redirect()->route('Education.index')->with('Error','Sorry! There is an error updating applicant education list');
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
        $education=$this->education->find($id);
//        dd($education);
        if(!$education){
            return redirect()->route()->with('Error','Applicant education list not found');
        }
        $qualification_certificate = public_path() . '/upload/Applicant/Education/'.$education->qualification_certificate;
        if (File::exists($qualification_certificate)) {
            $delete = File::delete($qualification_certificate);
//            dd($delete);
        }
        $marksheet = public_path() . '/upload/Applicant/Education/'.$education->marksheet;
        if (File::exists($marksheet)) {
            $delete = File::delete($marksheet);
        }
        $success=$education->delete();
        if($success){
            return redirect()->route('Education.index')->with('success','Applicant Education Deleted Successfully');
        }
        {
            return redirect()->route('Education.index')->with('Error','Sorry! There is an error deleting applicant education list');
        }
    }
}
