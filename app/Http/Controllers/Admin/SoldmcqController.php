<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Soldmcq;
use App\Admin\MCQ;
use App\Admin\Enquiry;
class SoldmcqController extends Controller
{
	public function __construct()
	{
		$this->soldmcq=new Soldmcq();
		$this->mcq=new MCQ();
		$this->enquiry=new Enquiry();
	}

    public function index()
    {
        $soldmcqs=$this->soldmcq->getAll();
    	return view('Admin.MCQ.sold.index',compact('soldmcqs'));
    }


    public function create()
    {
    	$data['enquiries']= $this->enquiries();
        $data['mcqs']=$this->mcqs();
    	return view("Admin.MCQ.sold.form",compact('data'));
    }

    public function store(Request $request)
    {
    	$data=$request->validate([
    		'mcqId'=>'required',
    		'enquiryId'=>'required',
    		'totalAmount'=>'required',
            'date'=>'required'
    	]);
    	

    	$mcq=$this->mcq->where('id',$data['mcqId'])->firstOrfail();
    	$sold=$this->soldmcq->where(['mcqId'=>$data['mcqId'],'enquiryId'=>$data['enquiryId']])->count();
    	if($sold>0)
    		return redirect()->route('soldMCQ.create')->with('Error','This MCQ was already sold by him or her');
    	
    	if($mcq->status<=0)
    		return redirect()->route('soldMCQ.create')->with('Error','This MCQ is not available');
       	$this->soldmcq->soldMCQStore($data);
    	return redirect()->route('soldMCQ.index')->with('success','Sold book added successfully');
    }

    public function edit(Soldmcq $soldmcq)
    {
        $data['enquiries']= $this->enquiries();
        $data['mcq']=$this->mcqs();
        return view('Admin.Book.sold.form',compact('data','soldmcq'));
    }

    protected function enquiries()
    {
        return $this->enquiry->get(['id','first_name','middle_name','last_name']);
        
    }
    protected function mcqs()
    {
       return $this->mcq->getAll();
    }
}
