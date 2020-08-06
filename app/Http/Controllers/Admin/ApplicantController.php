<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use App\Http\Requests\ApplicantValidator;
use File;

class ApplicantController extends Controller
{
    protected $category = null;
    protected $applicant = null;
    protected $enquiry = null;

    public function __construct(Applicant $applicant, Category $category, Enquiry $enquiry)
    {
        $this->category = $category;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
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
    public function store(ApplicantValidator $request)
    {
        $data = $request->all();
//        dd($data);
        if ($request->passport_docs) {
            $path = public_path() . '/upload/file';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = "Document-" . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();
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
        $cat = $applicant->Category_Applicant->Name;
        @$first_name = $applicant->Enquiry_Applicant->first_name;
        @$middle_name = $applicant->Enquiry_Applicant->middle_name;
        @$last_name = $applicant->Enquiry_Applicant->last_name;

        if (empty($applicant)) {
            return redirect()->back()->with('Error', 'Applicant Not Found');
        } else {
            return view('Admin.Applicant.Update')->with('applicant', $applicant)->with('category', $category)->with('cat', $cat)
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
        $data = $request->all();
//        dd($data);
        if ($request->passport_docs) {
            $path = public_path() . '/upload/file';
            if (!File::exists($path)) {
                File::makeDirectory($path, true, true);
            }
            $file_name = "Document-" . date('Ymdhid') . rand(0, 99) . "." . $request->passport_docs->getClientOriginalExtension();
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
        $image_path = public_path() . '/upload/file/' . $applicant->passport_docs;
        if (File::exists($image_path)) {
            $delete = File::delete($image_path);
        }
        $success = $applicant->delete();
        if ($success) {
            return redirect()->route('Applicant.index')->with('success', 'Applicant Deleted Successfully');
        } else {
            return redirect()->route('Applicant.index')->with('Error', 'Sorry! ApSorry! there is an error deleting applicant');
        }

    }
}
