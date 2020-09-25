<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Education;
use App\Admin\Education3;
use App\Http\Requests\Educationvalidator;
use App\Admin\Applicant;
use File;
use Auth;

class Education3Controller extends Controller
{
    protected $education3 = null;
    protected $applicant = null;

    public function __construct(Education3 $education3, Applicant $applicant)
    {
        $this->education3 = $education3;
        $this->applicant = $applicant;
    }

    public function index()
    {
        $education = $this->education3->get();
//        dd($education);
        return view('Admin.Applicant.Education.Education3.Index')->with('education', $education);
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
        return view('Admin.Applicant.Education.Education3.Add')->with('applicant', $applicant);
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
        $this->education3->fill($data);
        $success = $this->education3->save();
        /*Qualification certificate*/
        if ($request->qualification_certificate) {
            $first_Name = $this->education3->Applicant_Education3->first_name;
            $middel_Name = $this->education3->Applicant_Education3->middel_name;
            $last_Name = $this->education3->Applicant_Education3->surname;
            $name = $first_Name . ' ' . $middel_Name . ' ' . $last_Name;
//            dd($name);
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . '-Qualification Certificate3-' . date('Ymdhid') . rand(0, 99) . "." . $request->qualification_certificate->getClientOriginalExtension();
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
            $first_Name = $this->education3->Applicant_Education3->first_name;
            $middel_Name = $this->education3->Applicant_Education3->middel_name;
            $last_Name = $this->education3->Applicant_Education3->surname;
            $name = $first_Name . ' ' . $middel_Name . ' ' . $last_Name;
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . "-marksheet3-" . date('Ymdhid') . rand(0, 99) . "." . $request->marksheet->getClientOriginalExtension();
            $success = $request->marksheet->move($path, $file_name);

            if ($success) {
                $data['marksheet'] = $file_name;
            } else {
                $data['marksheet'] = null;
            }
        }
        /*Character Certificate*/
        if ($request->character_certificate) {
            $first_Name=$this->education3->Applicant_Education3->first_name;
            $middel_Name=$this->education3->Applicant_Education3->middel_name;
            $last_Name=$this->education3->Applicant_Education3->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-character_certificate3-" . date('Ymdhid') . rand(0, 99) . "." . $request->character_certificate->getClientOriginalExtension();
            $success = $request->character_certificate->move($path, $file_name);

            if ($success) {
                $data['character_certificate'] = $file_name;
            } else {
                $data['character_certificate'] = null;
            }

        }
        $this->education3->fill($data);
        $success = $this->education3->save();
        if ($success) {
            return redirect()->route('Education3.index')->with('success', 'Applicant Education Added Successfully');
        } else {
            return redirect()->route('Education3.index')->with('Error', 'Sorry! There is an error adding applicant education list');
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
        $education = $this->education3->find($id);
        $applicant = $this->applicant->get();
        $app = $education->Applicant_Education3->first_name;
        return view('Admin.Applicant.Education.Education3.Update')->with('applicant', $applicant)->with('education', $education)
            ->with('app', $app);
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
        $this->education3 = $this->education3->find($id);
        $data = $request->all();
        if ($request->qualification_certificate) {
            $first_name = $this->education3->Applicant_Education3->first_name;
            $middel_name = $this->education3->Applicant_Education3->middel_name;
            $surname = $this->education3->Applicant_Education3->surname;
            $name = $name = $first_name . ' ' . $middel_name . ' ' . $surname;
            $qualification_certificate = 'upload/Education/' . $this->education3->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . "-qualification_certificate3-" . date('Ymdhid') . rand(0, 99) . "." . $request->qualification_certificate->getClientOriginalExtension();
            $success = $request->qualification_certificate->move($path, $file_name);

            if ($success) {
                $data['qualification_certificate'] = $file_name;
            } else {
                $data['qualification_certificate'] = null;
            }

        }
        if ($request->marksheet) {
            $first_name = $this->education3->Applicant_Education3->first_name;
            $middel_name = $this->education3->Applicant_Education3->middel_name;
            $surname = $this->education3->Applicant_Education3->surname;
            $name = $name = $first_name . ' ' . $middel_name . ' ' . $surname;
            $marksheet = 'upload/Education/' . $this->education3->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . "-marksheet3-" . date('Ymdhid') . rand(0, 99) . "." . $request->marksheet->getClientOriginalExtension();
            $success = $request->marksheet->move($path, $file_name);

            if ($success) {
                $data['marksheet'] = $file_name;
            } else {
                $data['marksheet'] = null;
            }

        }
        /*Character Certificate*/
        if ($request->character_certificate) {
            $first_Name=$this->education3->Applicant_Education3->first_name;
            $middel_Name=$this->education3->Applicant_Education3->middel_name;
            $last_Name=$this->education3->Applicant_Education3->surname;
            $name=$first_Name.' '.$middel_Name.' '.$last_Name;
            $character_certificate = 'upload/Education/'.$this->education3->character_certificate;
            if (File::exists($character_certificate)) {
                $delete = File::delete($character_certificate);
            }
            $path = 'upload/Education';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name."-character_certificate3-" . date('Ymdhid') . rand(0, 99) . "." . $request->character_certificate->getClientOriginalExtension();
            $success = $request->character_certificate->move($path, $file_name);

            if ($success) {
                $data['character_certificate'] = $file_name;
            } else {
                $data['character_certificate'] = null;
            }

        }
        $this->education3->fill($data);
        $success = $this->education3->save();
        if ($success) {
            return redirect()->route('Education3.index')->with('success', 'Applicant Education Updated Successfully');
        } else {
            return redirect()->route('Education3.index')->with('Error', 'Sorry! There is an error updating applicant education list');
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
        $education=$this->education3->find($id);
        if(!$education){
            return redirect()->route()->with('Error','Applicant education list not found');
        }
        $qualification_certificate = 'upload/Education/'.$education->qualification_certificate;
        if (File::exists($qualification_certificate)) {
            $delete = File::delete($qualification_certificate);
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
            return redirect()->route('Education3.index')->with('success','Applicant Education Deleted Successfully');
        }
        {
            return redirect()->route('Education3.index')->with('Error','Sorry! There is an error deleting applicant education list');
        }
    }
}
