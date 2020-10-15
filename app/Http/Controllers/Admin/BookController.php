<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Book;



class BookController extends Controller
{
    public function __construct()
    {
    	$this->book=new Book();
    }

    public function index()
    {
    	$books=$this->book->getAll();
    	return view('Admin.Book.index',compact('books'));
    }

    public function create()
    {
    	return view('Admin.Book.form');
    }

    public function store(Request $request)
    {
    	$data=$this->validationRequest();
    	$this->book->bookStore($data);
    	return redirect()->route('book.index')->with('success', 'Book added successfully');
    }

    public function edit(Book $book)
    {
    	return view('Admin.Book.form',compact('book'));
    }

    public function update(Book $book,Request $request)
    {
        $data=$this->validationRequest($book->id);
    	$data['status']=$this->book->status($data['qty']);
    	$book->update($data);
    	return redirect()->route('book.index')->with('success','Book updated successfully');
    }

    public function delete(Book $book)
    {
    	$book->delete();
    	return redirect()->route('book.index')->with('Error','Book deleted Successfully');
    }



 
    public function getPrice(Request $request)
    {
    	
    	return $this->book->where('id',$request->id)->firstOrfail()->price;
    }


    protected function validationRequest($id=null)
    {
        return request()->validate([
            'bookname'=>'required|unique:books,bookname,'.@$id,
            'qty'=>'required',
            'price'=>'required'
        ]);
    }

}
