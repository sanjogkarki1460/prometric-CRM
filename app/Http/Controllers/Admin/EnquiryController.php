<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Enquiry;
use App\Http\Requests\EnquiryValidator;

class EnquiryController extends Controller
{
    protected $category=null;
    protected $enquiry=null;

    public function __construct(Enquiry $enquiry,Category $category)
    {
        $this->category=$category;
        $this->enquiry=$enquiry;
    }

    public function index()
    {
        $enquiry=$this->enquiry->get();
        return view('Admin.Enquiry.Index')->with('enquiry',$enquiry);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=$this->category->get();
        return view('Admin.Enquiry.Add')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnquiryValidator $request)
    {
        $data=$request->all();
//        dd($data);
        $this->enquiry->fill($data);
        $success=$this->enquiry->save();
        if($success){
            return redirect()->route('Enquiry.index')->with('success','Enquiry Created Succesfully');
        }
        else
            return redirect()->route('Enquiry.index')->with('Error','Sorry! Enquiry Creation Failed');
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
        $category=$this->category->get();
        $enquiry=$this->enquiry->find($id);
//        dd($enquiry);
        $cat=$enquiry->Category_Enquiry->Name;
//        dd($cat);
//        dd($cat);
        if(empty($enquiry)){
            return redirect()->back()->with('Error','Enquiry Not Found');
        }
        else{
            return view('Admin.Enquiry.Update')->with('enquiry',$enquiry)->with('category',$category)->with('cat',$cat);
        }
//        dd($enquiry);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnquiryValidator $request, $id)
    {
        $this->enquiry=$this->enquiry->find($id);
        $data=$request->all();
        $this->enquiry->fill($data);
        $success = $this->enquiry->save();
        return redirect()->route('Enquiry.index')->with('success','Enquiry Updated Successfully');
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $enquiry=$this->enquiry->find($id);
        if(!$enquiry){
            return redirect()->back()->with('Error','Enquiry Not Found');
        }
        $success=$enquiry->delete();
        if($success){
            return redirect()->route('Enquiry.index')->with('success','Enquiry Deleted Successfully');
        }
        else{
            return redirect()->route('Enquiry.index')->with('Error','Sorry! Enquiry Not Deleted');
        }

    }
}
