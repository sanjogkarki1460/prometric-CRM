<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\CheckList;
use App\Http\Requests\CheckListValidator;
use Auth;

class CheckListController extends Controller
{
    protected $Applicant=null;
    protected $CheckList=null;

    public function __construct(Applicant $applicant,CheckList $checkList)
    {
        $this->CheckList=$checkList;
        $this->Applicant=$applicant;
    }

    public function index()
    {
        $checklist=$this->CheckList->get();
        return view('Admin.Applicant.CheckList.Index')->with('checklist',$checklist);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $applicant=$this->Applicant->get();
        return view('Admin.Applicant.CheckList.Add')->with('applicant',$applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckListValidator $request)
    {
        $data=$request->all();
//        dd($data);
        $this->CheckList->fill($data);
        $success=$this->CheckList->save();
        if($success){
            return redirect()->route('CheckList.index')->with('success','Applicant CheckList Added Successfully');
        }
        else{
            return redirect()->route('CheckList.index')->with('Error','Sorry! There is an error Adding Applicant CheckList ');
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $checklist=$this->CheckList->find($id);
//        dd($checklist);
        return view('Admin.Applicant.CheckList.Update')->with('checklist',$checklist);
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $checklist=$this->CheckList->find($id);
        if(!$checklist){
            return redirect()->route('CheckList.index')->with('Error','CheckList Not Found');
        }
        $data=$request->all();
        $mrp_size_photo= $request->has('mrp_size_photo') ? 'Yes' : 'No';
        $passport= $request->has('passport') ? 'Yes' : 'No';
        $citizen= $request->has('citizen') ? 'Yes' : 'No';
        $slc_marksheet= $request->has('slc_marksheet') ? 'Yes' : 'No';
        $slc_character_certificate= $request->has('slc_character_certificate') ? 'Yes' : 'No';
        $slc_certificate= $request->has('slc_certificate') ? 'Yes' : 'No';
        $plus2certificate= $request->has('plus2certificate') ? 'Yes' : 'No';
        $plus2transcript= $request->has('plus2transcript') ? 'Yes' : 'No';
        $plus2character_certificate= $request->has('plus2character_certificate') ? 'Yes' : 'No';
        $diploma_certificate= $request->has('diploma_certificate') ? 'Yes' : 'No';
        $diploma_transcript= $request->has('diploma_transcript') ? 'Yes' : 'No';
        $diploma_character_certificate= $request->has('diploma_character_certificate') ? 'Yes' : 'No';
        $bachelor_certificate= $request->has('bachelor_certificate') ? 'Yes' : 'No';
        $bachelor_transcript= $request->has('bachelor_transcript') ? 'Yes' : 'No';
        $bachelor_character_certificate= $request->has('bachelor_character_certificate') ? 'Yes' : 'No';
        $master_certificate= $request->has('master_certificate') ? 'Yes' : 'No';
        $master_transcript= $request->has('master_transcript') ? 'Yes' : 'No';
        $master_character_certificate= $request->has('master_character_certificate') ? 'Yes' : 'No';
        $internship_completion_certificate= $request->has('internship_completion_certificate') ? 'Yes' : 'No';
        $equivalent_certificate= $request->has('equivalent_certificate') ? 'Yes' : 'No';
        $council_registration_certificate_front= $request->has('council_registration_certificate_front') ? 'Yes' : 'No';
        $council_registration_certificate_back= $request->has('council_registration_certificate_back') ? 'Yes' : 'No';
        $council_good_standing_letter= $request->has('council_good_standing_letter') ? 'Yes' : 'No';
        $work_experience_letter1= $request->has('work_experience_letter1') ? 'Yes' : 'No';
        $work_experience_letter2= $request->has('work_experience_letter2') ? 'Yes' : 'No';
        $work_experience_letter3= $request->has('work_experience_letter3') ? 'Yes' : 'No';
        $work_experience_letter4= $request->has('work_experience_letter4') ? 'Yes' : 'No';
        $work_experience_letter5= $request->has('work_experience_letter5') ? 'Yes' : 'No';
        $basic_life_support_certificate= $request->has('basic_life_support_certificate') ? 'Yes' : 'No';
        $signed_letter_authorization= $request->has('signed_letter_authorization') ? 'Yes' : 'No';
        $signed_service_agreement= $request->has('signed_service_agreement') ? 'Yes' : 'No';
        $checklist->mrp_size_photo=$mrp_size_photo;
        $checklist->passport=$passport;
        $checklist->citizen=$citizen;
        $checklist->slc_marksheet=$slc_marksheet;
        $checklist->slc_character_certificate=$slc_character_certificate;
        $checklist->slc_certificate=$slc_certificate;
        $checklist->plus2certificate=$plus2certificate;
        $checklist->plus2transcript=$plus2transcript;
        $checklist->plus2character_certificate=$plus2character_certificate;
        $checklist->diploma_certificate=$diploma_certificate;
        $checklist->diploma_transcript=$diploma_transcript;
        $checklist->diploma_character_certificate=$diploma_character_certificate;
        $checklist->bachelor_certificate=$bachelor_certificate;
        $checklist->bachelor_transcript=$bachelor_transcript;
        $checklist->bachelor_character_certificate=$bachelor_character_certificate;
        $checklist->master_certificate=$master_certificate;
        $checklist->master_transcript=$master_transcript;
        $checklist->master_character_certificate=$master_character_certificate;
        $checklist->internship_completion_certificate=$internship_completion_certificate;
        $checklist->equivalent_certificate=$equivalent_certificate;
        $checklist->council_registration_certificate_front=$council_registration_certificate_front;
        $checklist->council_registration_certificate_back=$council_registration_certificate_back;
        $checklist->council_good_standing_letter=$council_good_standing_letter;
        $checklist->work_experience_letter1=$work_experience_letter1;
        $checklist->work_experience_letter2=$work_experience_letter2;
        $checklist->work_experience_letter3=$work_experience_letter3;
        $checklist->work_experience_letter4=$work_experience_letter4;
        $checklist->work_experience_letter5=$work_experience_letter5;
        $checklist->basic_life_support_certificate=$basic_life_support_certificate;
        $checklist->signed_letter_authorization=$signed_letter_authorization;
        $checklist->signed_service_agreement=$signed_service_agreement;
//        dd($checklist->mrp_size_photo);
        $success=$checklist->update();
        if($success){
            return redirect()->route('CheckList.index')->with('success','Applicant CheckList Uptaded Successfully');
        }
        else{
            return redirect()->route('CheckList.index')->with('Error','Sorry! There is an error Updating Applicant CheckList ');
        }
    }
    public function destroy($id)
    {
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $checklist=$this->CheckList->find($id);
        if(!$checklist){
            return redirect()->route('CheckList.index')->with('Error','CheckList Not Found');
        }
        $success=$checklist->delete();
        if($success){
            return redirect()->route('CheckList.index')->with('success','CheckList Deleted Successfully');
        }
        else{
            return redirect()->route('CheckList.index')->with('Error','Sorry! There is an error Deleting Applicant CheckList ');
        }
    }
}
