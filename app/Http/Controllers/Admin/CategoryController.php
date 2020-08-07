<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Http\Requests\CategoryValidator;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use DB;

class CategoryController extends Controller
{
    protected $category = null;
    protected $applicant= null;
    protected $enquiry = null;

    public function __construct(Category $category,Applicant $applicant,Enquiry $enquiry)
    {
        $this->category = $category;
        $this->applicant = $applicant;
        $this->enquiry = $enquiry;
    }

    public function index()
    {
        $category = $this->category->orderBy('id', 'desc')->get();
        return view('Admin.Category.Index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Category.Add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidator $request)
    {
        $data = $request->all();
//        dd($data);
        $this->category->fill($data);
        $success = $this->category->save();
        if ($success) {
            return redirect()->route('Category.index')->with('success', 'Category Created Successfully');
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
        $category = Category::findOrfail($id);
        return view('Admin.Category.Update')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidator $request, $id)
    {
        $this->category=$this->category->find($id);
        $data=$request->all();
        $this->category->fill($data);
        $success = $this->category->save();
        return redirect()->route('Category.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $enquiry = $this->enquiry->where('Category_id',$id)->get();
        $applicant= $this->applicant->where('applicant_category',$id)->get();
//        dd($applicant);
        foreach ($enquiry as $data) {
            DB::table('enquiries')->where('Category_id', $id)->delete();
        };
        foreach ($applicant as $data) {
            DB::table('applicants')->where('applicant_category', $id)->delete();
        };
        $success= $category->delete();
        if ($success) {
            return redirect()->route('Category.index')->with('success', 'Category Deleted Successfully');
        }



    }
}
