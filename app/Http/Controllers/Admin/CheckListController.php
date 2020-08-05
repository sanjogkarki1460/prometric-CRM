<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Applicant;
use App\Admin\CheckList;
use App\Http\Requests\CheckListValidator;

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
        $checklist=$this->CheckList->find($id);
        if(!$checklist){
            return redirect()->route('CheckList.index')->with('Error','CheckList Not Found');
        }
        $data=$request->all();
        $password_citizenship_certificate= $request->has('password_citizenship_certificate') ? 'Yes' : 'No';
        $slc_certificate= $request->has('slc_certificate') ? 'Yes' : 'No';
        $plus_two_isc_pcl_certificate= $request->has('plus_two_isc_pcl_certificate') ? 'Yes' : 'No';
        $diploma_degree_certificate= $request->has('diploma_degree_certificate') ? 'Yes' : 'No';
        $mark_sheet_of_each_year_final_transcript= $request->has('mark_sheet_of_each_year_final_transcript') ? 'Yes' : 'No';
        $equivalent_certificate= $request->has('equivalent_certificate') ? 'Yes' : 'No';
        $council_registration_certificate= $request->has('council_registration_certificate') ? 'Yes' : 'No';
        $council_registration_certificate_renew= $request->has('council_registration_certificate_renew') ? 'Yes' : 'No';
        $good_standing_letter_from_council= $request->has('good_standing_letter_from_council') ? 'Yes' : 'No';
        $work_experience_letter_till_date= $request->has('work_experience_letter_till_date') ? 'Yes' : 'No';
        $basic_life_support_for_nurses= $request->has('basic_life_support_for_nurses') ? 'Yes' : 'No';
        $mrp_size_photo_in_white_background= $request->has('mrp_size_photo_in_white_background') ? 'Yes' : 'No';
        $checklist->password_citizenship_certificate=$password_citizenship_certificate;
        $checklist->slc_certificate=$slc_certificate;
        $checklist->plus_two_isc_pcl_certificate=$plus_two_isc_pcl_certificate;
        $checklist->diploma_degree_certificate=$diploma_degree_certificate;
        $checklist->mark_sheet_of_each_year_final_transcript=$mark_sheet_of_each_year_final_transcript;
        $checklist->equivalent_certificate=$equivalent_certificate;
        $checklist->council_registration_certificate=$council_registration_certificate;
        $checklist->council_registration_certificate_renew=$council_registration_certificate_renew;
        $checklist->good_standing_letter_from_council=$good_standing_letter_from_council;
        $checklist->work_experience_letter_till_date=$work_experience_letter_till_date;
        $checklist->basic_life_support_for_nurses=$basic_life_support_for_nurses;
        $checklist->mrp_size_photo_in_white_background=$mrp_size_photo_in_white_background;
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
