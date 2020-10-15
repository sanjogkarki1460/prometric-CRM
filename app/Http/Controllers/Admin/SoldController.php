<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Soldbook;
use App\Admin\Book;
use App\Admin\Enquiry;
class SoldController extends Controller
{
	public function __construct()
	{
		$this->soldbook=new Soldbook();
		$this->book=new Book();
		$this->enquiry=new Enquiry();
	}

    public function index()
    {
        $soldbooks=$this->soldbook->getAll();
    	return view('Admin.Book.sold.index',compact('soldbooks'));
    }

    public function create()
    {
    	$data['enquiries']= $this->enquiries();
        $data['book']=$this->books();
    	return view("Admin.Book.sold.form",compact('data'));
    }

    public function store(Request $request)
    {
    	$data=$request->validate([
    		'bookId'=>'required',
    		'enquiryId'=>'required',
    		'totalAmount'=>'required'
    	]);
    	

    	$book=$this->book->where('id',$data['bookId'])->firstOrfail();
    	$sold=$this->soldbook->where(['bookId'=>$data['bookId'],'enquiryId'=>$data['enquiryId']])->count();
    	if($sold>0)
    		return redirect()->route('soldbook.create')->with('Error','This book was already sold by him or her');
    	
    	if($book->qty<=0)
    		return redirect()->route('soldbook.create')->with('Error','This book was out of stock');
    	$book->decrement('qty');
    	if($book->qty<=0)
    	{

    		$status=$this->book->status($book->qty);
    		$book->update(['status'=>$status]);
    	}
       	$this->soldbook->soldStore($data);

    	
    	return redirect()->route('soldbook.index')->with('success','Sold book added successfully');
    }

    public function edit(Soldbook $soldbook)
    {
        $data['enquiries']= $this->enquiries();
        $data['book']=$this->books();
        return view('Admin.Book.sold.form',compact('data','soldbook'));
    }

    protected function enquiries()
    {
        return $this->enquiry->get(['id','first_name','middle_name','last_name']);
        
    }
    protected function books()
    {
       return $this->book->getAll();
    }
}
