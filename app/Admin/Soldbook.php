<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Book;
use App\Admin\Enquiry;

class Soldbook extends Model
{
    protected $guarded=[];


    public function getAll()
    {
    	return self::get();
    }

    public function soldStore($data)
    {
    	self::create($data);
    }

    public function book()
    {
    	return $this->belongsTo(Book::class,'bookId');
    }

    public function enquiry()
    {
    	return $this->belongsTo(Enquiry::class,'enquiryId');
    }
}
