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
use App\Admin\Education;
use App\Admin\HealthLisence;
use App\Admin\Employment;
use App\Admin\ProgressFlow;
use DB;
use App\Admin\Admin;
use Thread;

class ApplicantController extends Controller
{
    protected $category = null;
    protected $applicant = null;
    protected $enquiry = null;
    protected $checklist = null;
    protected $education = null;
    protected $healthlisence = null;
    protected $employment = null;
    protected $progressflow = null;

    public function __construct(Applicant $applicant, Category $category, Enquiry $enquiry, CheckList $checkList,
                                Education $education, HealthLisence $healthlisence, Employment $employment,
                                ProgressFlow $progressflow)
    {
        $this->category = $category;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
        $this->checkList = $checkList;
        $this->education = $education;
        $this->healthlisence = $healthlisence;
        $this->employment = $employment;
        $this->progressflow = $progressflow;
    }

    public function index()
    {
        $applicant = $this->applicant->get();
        return view('Admin.Applicant.Index')->with('applicant', $applicant);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->get();
        $enquiry = $this->enquiry->get();
        return view('Admin.Applicant.Add')->with('category', $category)->with('enquiry', $enquiry);
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
        $name = $request->first_name . ' ' . $request->middel_name . ' ' . $request->surname;
//        dd($name);
//        dd($data);
        if ($request->passport_docs) {
            $path = public_path() . '/upload/Applicant';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = $name . '-passport_docs-' . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();
//            dd($file_name);
//        dd($file_name);
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
        $category = $this->category->get();
        $enquiry = $this->enquiry->get();
        $applicant = $this->applicant->find($id);
//        dd($applicant);
//        dd($applicant);
        if ($applicant->applicant_category) {
            $cat = $applicant->Category_Applicant->Name;
//            dd($cat);
        }
        @$first_name = $applicant->Enquiry_Applicant->first_name;
//        dd($first_name);
        @$middle_name = $applicant->Enquiry_Applicant->middle_name;
        @$last_name = $applicant->Enquiry_Applicant->last_name;

        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        } elseif ($applicant->applicant_category) {
            return view('Admin.Applicant.Update')->with('applicant', $applicant)->with('category', $category)->with('cat', $cat)
                ->with('enquiry', $enquiry)->with('first_name', $first_name)->with('last_name', $last_name)->with('middle_name', $middle_name);
        } else {
            return view('Admin.Applicant.Update')->with('applicant', $applicant)->with('category', $category)
                ->with('enquiry', $enquiry)->with('first_name', $first_name)->with('last_name', $last_name)->with('middle_name', $middle_name);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicantValidator $request, $id)
    {

        $this->applicant = $this->applicant->find($id);
        $name = $request->first_name . ' ' . $request->middel_name . ' ' . $request->surname;
        $data = $request->all();
        if ($request->passport_docs) {
            $image_path = public_path() . '/upload/Applicant/'.$this->applicant->passport_docs;
            if (File::exists($image_path)) {
                $delete = File::delete($image_path);
            }
            $path = public_path() . '/upload/Applicant/';
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
        $this->applicant->fill($data);
        $success = $this->applicant->save();
        $admin = Admin::all();
//        dd($admin);
        foreach ($admin as $admin)
            $admin->notify(new \App\Notifications\ApplicantUpdateNotification());
        return redirect()->route('Applicant.index')->with('success', 'Applicant Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $applicant = $this->applicant->find($id);
        if (!$applicant) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        }
        $image_path = public_path() . '/upload/Applicant/' . $applicant->passport_docs;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $checkList = $this->checkList->where('applicant_id', $id)->get();
        $education = $this->education->where('applicant_id', $id)->get();
        $healthlisence = $this->healthlisence->where('applicant_id', $id)->get();
        $employment = $this->employment->where('applicant_id', $id)->get();
        $progressflow = $this->progressflow->where('applicant_id', $id)->get();
        foreach ($checkList as $data) {
            DB::table('check_lists')->where('applicant_id', $id)->delete();
        };
        foreach ($education as $data) {
            DB::table('education')->where('applicant_id', $id)->delete();
        };
        foreach ($healthlisence as $data) {
            DB::table('health_lisences')->where('applicant_id', $id)->delete();
        };
        foreach ($employment as $data) {
            DB::table('employments')->where('applicant_id', $id)->delete();
        };
        foreach ($progressflow as $data) {
            DB::table('progress_flows')->where('applicant_id', $id)->delete();
        };
        $success = $applicant->delete();
        if ($success) {
            return redirect()->route('Applicant.index')->with('success', 'Applicant Deleted Successfully');
        } else {
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! ApSorry! there is an error deleting applicant');
        }

    }

    public function Detail($id)
    {
        $applicant = $this->applicant->find($id);
        $checklist = $this->checkList->where('applicant_id', $id)->get();
        $education = $this->education->where('applicant_id', $id)->get();
        $healthlisence = $this->healthlisence->where('applicant_id', $id)->get();
        $employment = $this->employment->where('applicant_id', $id)->get();
        $progressflow = $this->progressflow->where('applicant_id', $id)->get();
//        dd($education);
        return view('Admin.Applicant.Detail')->with('applicant', $applicant)->with('checklist', $checklist)
            ->with('education', $education)->with('healthlisence', $healthlisence)->with('employment', $employment)
            ->with('progressflow', $progressflow);
    }
}
