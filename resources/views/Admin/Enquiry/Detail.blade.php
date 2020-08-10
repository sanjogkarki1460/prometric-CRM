@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Enquiry Detail</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('Enquiry.index')}}">Enquiry list</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">View Enquiry Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-center text-danger">Enquiry Detail</h3>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-primary">ID</h5>
                                <p>{{$enquiry->id}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">First Name</h5>
                                <p>{{$enquiry->first_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Middle Name</h5>
                                <p>{{$enquiry->middle_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Last Name</h5>
                                <p>{{$enquiry->last_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Email</h5>
                                <p>{{$enquiry->email}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Phone</h5>
                                <p>{{$enquiry->phone}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Address</h5>
                                <p>{{$enquiry->address}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Subject</h5>
                                <p>{{$enquiry->subject}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Qualification</h5>
                                <p>{{$enquiry->qualification_level}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Experience</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Country Interested</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Service Interested</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Enquiry From</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Source</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Remarks</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Responded Through</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Eligibility</h5>
                                <p>Null</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Category</h5>
                                <p>Null</p>
                            </div>
                        </div>
                        <div class="col-md-12 row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <button  class="btn btn-success">Update</button>
                                <button class="btn btn-danger">Delete</button>
                                <button class="btn btn-primary">Back</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection