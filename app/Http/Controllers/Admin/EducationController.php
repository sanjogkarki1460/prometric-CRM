<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Education1;
use App\Http\Requests\Educationvalidator;
use App\Admin\Applicant;
use File;
use Auth;

class EducationController extends Controller
{
    protected $education1 = null;
    protected $applicant = null;

    public function __construct(Education1 $education1, Applicant $applicant)
    {
        $this->education1 = $education1;
        $this->applicant = $applicant;
    }

    public function index()
    {
        $education = $this->education1->get();
        return view('Admin.Applicant.Education.Education1.Index')->with('education', $education);
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
        return view('Admin.Applicant.Education.Education1.Add')->with('applicant', $applicant);
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
        $this->education1->fill($data);
        $success=$this->education1->save();

        if ($request->qualification_certificate) {
            $first_Name=$this->education1->Applicant_Education->first_name;
            $middel_Name=$this->education1->Applicant_Education->middel_name;
            $last_Name=$this->education1->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Education';
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
            $first_Name=$this->education1->Applicant_Education->first_name;
            $middel_Name=$this->education1->Applicant_Education->middel_name;
            $last_Name=$this->education1->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Education';
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
        /*Chearacter Certificate*/
        if ($request->character_certificate) {
            $first_Name=$this->education1->Applicant_Education->first_name;
            $middel_Name=$this->education1->Applicant_Education->middel_name;
            $last_Name=$this->education1->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Education';
//            dd($path);
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-character_certificate-" . date('Ymdhid') . rand(0, 99) . "." . $request->character_certificate->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->character_certificate->move($path, $file_name);

            if ($success) {
                $data['character_certificate'] = $file_name;
            } else {
                $data['character_certificate'] = null;
            }

        }
        $this->education1->fill($data);
        $success=$this->education1->save();
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $education=$this->education1->find($id);
        $applicant = $this->applicant->get();
        $app=$education->Applicant_Education->first_name;
//        dd($app);
        return view('Admin.Applicant.Education.Education1.Update')->with('applicant', $applicant)->with('education',$education)
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $this->education = $this->education1->find($id);
        $data = $request->all();
//        dd($data);
        /*Qualification Certificate*/
        if ($request->qualification_certificate) {
            $first_name=$this->education->Applicant_Education->first_name;
            $middel_name=$this->education->Applicant_Education->middel_name;
            $surname=$this->education->Applicant_Education->surname;
            $name=$name=$first_name.' '.$middel_name.' '.$surname;
            $qualification_certificate = 'upload/Education/'.$this->education->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $path = 'upload/Education';
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
            $marksheet = 'upload/Education/'.$this->education->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $path = 'upload/Education';
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
        /*Character Certificate*/
        if ($request->character_certificate) {
            $first_Name=$this->education->Applicant_Education->first_name;
            $middel_Name=$this->education->Applicant_Education->middel_name;
            $last_Name=$this->education->Applicant_Education->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $character_certificate = 'upload/Education/'.$this->education->character_certificate;
            if (File::exists($character_certificate)) {
                $delete = File::delete($character_certificate);
            }
            $path = 'upload/Education';
//            dd($path);
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-character_certificate-" . date('Ymdhid') . rand(0, 99) . "." . $request->character_certificate->getClientOriginalExtension();
//        dd($file_name);
            $success = $request->character_certificate->move($path, $file_name);

            if ($success) {
                $data['character_certificate'] = $file_name;
            } else {
                $data['character_certificate'] = null;
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $education=$this->education1->find($id);
//        dd($education);
        if(!$education){
            return redirect()->route()->with('Error','Applicant education list not found');
        }
        $qualification_certificate = 'upload/Education/'.$education->qualification_certificate;
        if (File::exists($qualification_certificate)) {
            $delete = File::delete($qualification_certificate);
//            dd($delete);
        }
        $marksheet = 'upload/Education/'.$education->marksheet;
        if (File::exists($marksheet)) {
            $delete = File::delete($marksheet);
        }
        $character_certificate = 'upload/Education/'.$education->character_certificate;
        if (File::exists($character_certificate)) {
            $delete = File::delete($character_certificate);
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
