<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\ApplicantValidator;
use File;
use App\Admin\CheckList;
use App\Admin\Education1;
use App\Admin\Education2;
use App\Admin\Education3;
use App\Admin\HealthLicense1;
use App\Admin\HealthLicense2;
use App\Admin\Employment1;
use App\Admin\Employment2;
use App\Admin\Employment3;
use App\Admin\Employment4;
use App\Admin\Employment5;
use App\Admin\ProgressFlow;
use DB;
use App\Admin\Admin;
use Thread;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class ApplicantController extends Controller
{
    protected $category = null;
    protected $applicant = null;
    protected $enquiry = null;
    protected $checklist = null;
    protected $education1 = null;
    protected $education2 = null;
    protected $education3 = null;
    protected $healthlicense1 = null;
    protected $healthlicense2 = null;
    protected $employment1 = null;
    protected $employment2 = null;
    protected $employment3 = null;
    protected $employment4 = null;
    protected $employment5 = null;
    protected $progressflow = null;

    public function __construct(Applicant $applicant, Category $category, Enquiry $enquiry, CheckList $checkList,
                                Education2 $education2, Education1 $education1,Education3 $education3,HealthLicense1 $healthLicense1, HealthLicense2 $healthlicense2,
                                Employment1 $employment1, Employment2 $employment2, Employment3 $employment3, Employment4 $employment4
        ,Employment5 $employment5, ProgressFlow $progressflow)
    {
        $this->category = $category;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
        $this->checkList = $checkList;
        $this->education1 = $education1;
        $this->education2 = $education2;
        $this->education3 = $education3;
        $this->healthLicense1 = $healthLicense1;
        $this->healthlicense2 = $healthlicense2;
        $this->employment1 = $employment1;
        $this->employment2 = $employment2;
        $this->employment3 = $employment3;
        $this->employment4 = $employment4;
        $this->employment5 = $employment5;
        $this->progressflow = $progressflow;
    }

    public function index(Request $request)
    {
        $query=$this->applicant->get();
        if(isset($request->category)){
            $query = $query->where('Category_id',$request->category);
        }
        if(isset($request->color_code)){
            $query = $query->where('color_code',$request->color_code);
        }
        if(isset($request->status)){
            $query = $query->where('status',$request->status);
        }
        $applicant=$query;
        $category=$this->category->get();
        return view('Admin.Applicant.Index')->with('applicant', $applicant)->with('category',$category);
    }


    public function create()
    {
        $category = $this->category->get();
        $enquiry = $this->enquiry->get();
        return view('Admin.Applicant.Add')->with('category', $category)->with('enquiry', $enquiry);
    }

    public function AppApplicant($id)
    {
        $category = $this->category->get();
        $applicantenquiry= $this->enquiry->where('id',$id)->first();
        return view('Admin.Applicant.Add')->with('category', $category)->with('applicantenquiry', $applicantenquiry);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantValidator $request, Admin $thread)
    {
        $data = $request->all();
        $name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        if ($request->pp_photo) {
            $path = 'upload/Applicant';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name .'-pp_photo-' . date('Ymdhid') . rand(0, 99) . "." . $request->pp_photo->getClientOriginalExtension();

            $success = $request->pp_photo->move($path, $file_name);

            if ($success) {
                $data['pp_photo'] = $file_name;
            } else {
                $data['pp_photo'] = null;
            }

        }
        if ($request->passport_docs) {
            $path = 'upload/Applicant';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name .'-passport_docs-' . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();

            $success = $request->passport_docs->move($path, $file_name);

            if ($success) {
                $data['passport_docs'] = $file_name;
            } else {
                $data['passport_docs'] = null;
            }

        }
        $this->applicant->fill($data);
        $success = $this->applicant->save();
        if ($success) {
            $admin = Admin::all();
            $thread = $this->applicant;
//        dd($admin);
            foreach ($admin as $admin)
                $admin->notify(new \App\Notifications\ApplicantNotification($thread));
            return redirect()->route('Applicant.index')->with('success', 'Applicant Created Succesfully');
        } else
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! Applicant Creation Failed');
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

        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
            return view('Admin.Applicant.Update')->with('applicant', $applicant);
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
        $data = $request->all();
        if ($request->pp_photo) {
            $image_path = 'upload/Applicant/'.$applicant->pp_photo;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            $path = 'upload/Applicant/';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . '-pp_photo-' . date('Ymdhid') . rand(0, 99) . "." . $request->pp_photo->getClientOriginalExtension();
            $success = $request->pp_photo->move($path, $file_name);

            if ($success) {
                $data['pp_photo'] = $file_name;
            } else {
                $data['pp_photo'] = null;
            }
        }
        if ($request->passport_docs) {
            $image_path = 'upload/Applicant/'.$applicant->passport_docs;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            $path = 'upload/Applicant/';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . '-passport_docs-' . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();
            $success = $request->passport_docs->move($path, $file_name);

            if ($success) {
                $data['passport_docs'] = $file_name;
            } else {
                $data['passport_docs'] = null;
            }
        }
        $applicant->fill($data);
        $success = $applicant->save();
        $admin = Admin::all();
        foreach ($admin as $admin)
            $admin->notify(new \App\Notifications\ApplicantUpdateNotification());
        return redirect()->route('Applicant.index')->with('success', 'Applicant Updated Successfully');
    }

    public function ColorUpdate(Request $request,$id){

        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $data=$request->all();
        $applicant->fill($data);
        $success = $applicant->save();
        if($success){
            $admin = Admin::all();
            foreach ($admin as $admin){
                $admin->notify(new \App\Notifications\ApplicantUpdateNotification());
            }
            session()->flash('success','Applicant Updated Successfully');
        }
            return redirect()->route('Applicant.index');
    }



    public function destroy($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $image_path = 'upload/Applicant/' . $applicant->passport_docs;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $pp_photo = 'upload/Applicant/' . $applicant->pp_photo;
        if (File::exists($pp_photo)) {
            $delete = File::delete($pp_photo);
        }
        $success = $applicant->delete();
        $checkList = $this->checkList->where('applicant_id', $id)->get();
        $education = $this->education1->where('applicant_id', $id)->get();
        $education2 = $this->education2->where('applicant_id', $id)->get();
        $education3 = $this->education3->where('applicant_id', $id)->get();
        $healthlicense1 = $this->healthLicense1->where('applicant_id', $id)->get();
        $healthlicense2 = $this->healthlicense2->where('applicant_id', $id)->get();
        $employment = $this->employment1->where('applicant_id', $id)->get();
        $employment2 = $this->employment2->where('applicant_id', $id)->get();
        $employment3 = $this->employment3->where('applicant_id', $id)->get();
        $employment4 = $this->employment4->where('applicant_id', $id)->get();
        $employment5 = $this->employment5->where('applicant_id', $id)->get();
        $progressflow = $this->progressflow->where('applicant_id', $id)->get();
        foreach ($checkList as $data) {
            DB::table('check_lists')->where('applicant_id', $id)->delete();
        };
        foreach ($education as $data) {
            $qualification_certificate = 'upload/Education/'.$data->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $marksheet = 'upload/Education/'.$data->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $character_certificate = 'upload/Education/'.$data->character_certificate;
            if (File::exists($character_certificate)) {
                $delete = File::delete($character_certificate);
            }
            DB::table('education1s')->where('applicant_id', $id)->delete();
        };
        foreach ($education2 as $data) {
            $qualification_certificate = 'upload/Education/'.$data->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $marksheet = 'upload/Education/'.$data->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $character_certificate = 'upload/Education/'.$data->character_certificate;
            if (File::exists($character_certificate)) {
                $delete = File::delete($character_certificate);
            }
            DB::table('education2s')->where('applicant_id', $id)->delete();
        };
        foreach ($education3 as $data) {
            $qualification_certificate = 'upload/Education/'.$data->qualification_certificate;
            if (File::exists($qualification_certificate)) {
                $delete = File::delete($qualification_certificate);
            }
            $marksheet = 'upload/Education/'.$data->marksheet;
            if (File::exists($marksheet)) {
                $delete = File::delete($marksheet);
            }
            $character_certificate = 'upload/Education/'.$data->character_certificate;
            if (File::exists($character_certificate)) {
                $delete = File::delete($character_certificate);
            }
            DB::table('education3s')->where('applicant_id', $id)->delete();
        };
        foreach ($healthlicense1 as $data) {
            $image_path = 'upload/Health License/' . $data->license_copy;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('health_license1s')->where('applicant_id', $id)->delete();
        };
        foreach ($healthlicense2 as $data) {
            $image_path = 'upload/Health License/' . $data->license_copy;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('health_license2s')->where('applicant_id', $id)->delete();
        };
        foreach ($employment as $data) {
            $image_path = 'upload/Employment/' . $data->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('employment1s')->where('applicant_id', $id)->delete();
        };
        foreach ($employment2 as $data) {
            $image_path = 'upload/Employment/' . $data->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('employment2s')->where('applicant_id', $id)->delete();
        };
        foreach ($employment3 as $data) {
            $image_path = 'upload/Employment/' . $data->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('employment3s')->where('applicant_id', $id)->delete();
        };
        foreach ($employment4 as $data) {
            $image_path = 'upload/Employment/' . $data->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('employment4s')->where('applicant_id', $id)->delete();
        };
        foreach ($employment5 as $data) {
            $image_path = 'upload/Employment/' . $data->experience_letter;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            DB::table('employment5s')->where('applicant_id', $id)->delete();
        };
        foreach ($progressflow as $data) {
            $signed_docs = 'upload/Progress flow/' . $data->signed_docs;
            if (File::exists($signed_docs)) {
                $delete = File::delete($signed_docs);
            }
            DB::table('progress_flows')->where('applicant_id', $id)->delete();
        };
        if ($success) {
            return redirect()->route('Applicant.index')->with('success', 'Applicant Deleted Successfully');
        } else {
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! ApSorry! there is an error deleting applicant');
        }

    }

    public function Detail($id)
    {
        $applicant = $this->applicant->find($id);
        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found Or Already Deleted');
        }
        $checklist = $this->checkList->where('applicant_id', $id)->first();
        $education = $this->education1->where('applicant_id', $id)->first();
        $education2 = $this->education2->where('applicant_id', $id)->first();
        $education3 = $this->education3->where('applicant_id', $id)->first();
        $healthlisence = $this->healthLicense1->where('applicant_id', $id)->first();
        $healthlicense2 = $this->healthlicense2->where('applicant_id', $id)->first();
        $employment = $this->employment1->where('applicant_id', $id)->first();
        $employment2 = $this->employment2->where('applicant_id', $id)->first();
        $employment3 = $this->employment3->where('applicant_id', $id)->first();
        $employment4 = $this->employment4->where('applicant_id', $id)->first();
        $employment5 = $this->employment5->where('applicant_id', $id)->first();
        $progressflow = $this->progressflow->where('applicant_id', $id)->first();
        return view('Admin.Applicant.Detail')->with('applicant', $applicant)->with('checklist', $checklist)
            ->with('education2', $education2)->with('education', $education)->with('education3', $education3)->with('healthlisence', $healthlisence)
            ->with('healthlicense2', $healthlicense2)->with('employment', $employment)->with('employment2', $employment2)
            ->with('employment3', $employment3)->with('employment4', $employment4)->with('employment5', $employment5)
            ->with('progressflow', $progressflow);
    }

     public function pdf($id)
    {
        $applicant = $this->applicant->find($id);
        $checklist = $this->checkList->where('applicant_id', $id)->first();
        $education = $this->education1->where('applicant_id', $id)->first();
        $education2 = $this->education2->where('applicant_id', $id)->first();
        $education3 = $this->education3->where('applicant_id', $id)->first();
        $healthlisence = $this->healthLicense1->where('applicant_id', $id)->first();
        $healthlicense2 = $this->healthlicense2->where('applicant_id', $id)->first();
        $employment = $this->employment1->where('applicant_id', $id)->first();
        $employment2 = $this->employment2->where('applicant_id', $id)->first();
        $employment3 = $this->employment3->where('applicant_id', $id)->first();
        $employment4 = $this->employment4->where('applicant_id', $id)->first();
        $employment5 = $this->employment5->where('applicant_id', $id)->first();
        $progressflow = $this->progressflow->where('applicant_id', $id)->first();
        $pdf = \PDF::loadView('Admin.Applicant.pdf.pdf',compact('applicant','checklist','education','education2','education3','healthlisence','healthlicense2','employment','employment2','employment3','employment4','employment5','progressflow'));
        return $pdf->download($applicant->first_name.'.pdf');
    }

}
