<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Http\Requests\CategoryValidator;
use App\Admin\Applicant;
use App\Admin\Enquiry;
use DB;
use Auth;

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
        return view('Admin.Profession.Index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Profession.Add');
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
            return redirect()->route('Profession.index')->with('success', 'Category Created Successfully');
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

        $category = Category::findOrfail($id);
        return view('Admin.Profession.Update')->with('category',$category);
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
        if(Auth::user()->role!='Admin')
        {
            return redirect()->back()->with('delete','Sorry you don\'t have access to view the requested resource');
        }
        $this->category=$this->category->find($id);
        $data=$request->all();
        $this->category->fill($data);
        $success = $this->category->save();
        return redirect()->route('Profession.index')->with('success','Category Updated Successfully');
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
        $category = Category::findOrfail($id);
        $success= $category->delete();
        if ($success) {
            return redirect()->route('Profession.index')->with('success', 'Category Deleted Successfully');
        }



    }
}
