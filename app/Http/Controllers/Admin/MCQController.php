<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Admin\MCQ;

class MCQController extends Controller
{
    public function __construct()
    {
    	$this->mcq=new MCQ();
    }

    public function index()
    {
    	$mcqs=$this->mcq->getAll();
    	return view('Admin.MCQ.index',compact('mcqs'));
    }

    public  function create()
    {
    	return view('Admin.MCQ.form');
    }

    public function store(Request $request)
    {
    	$data=$this->validationRequest();
    	$this->mcq->MCQStore($data);
    	return redirect()->route('MCQ.index')->with('success', 'MCQ added successfully');
    }

    public function edit(MCQ $mcq)
    {
    	return view('Admin.MCQ.form',compact('mcq'));
    }

    public function update(MCQ $mcq)
    {
    	$data=$this->validationRequest($mcq->id);
    	$data['status']=$this->mcq->status($data['noofsets']);
    	$mcq->update($data);
    	return redirect()->route('MCQ.index')->with('success','MCQ updated successfully');
    }

    public function delete(MCQ $mcq)
    {
    	$mcq->delete();
    	return redirect()->route('MCQ.index')->with('Error','MCQ deleted Successfully');
    }

    protected function validationRequest($id=null)
    {
    	return request()->validate([
    		'title'=>'required|unique:m_c_q_s,title,'.@$id,
    		'noofsets'=>'required',
    		'price'=>'required'
    	]);
    }

    public function getPrice(Request $request)
    {
    	
    	return $this->mcq->where('id',$request->id)->firstOrfail()->price;
    }
}
