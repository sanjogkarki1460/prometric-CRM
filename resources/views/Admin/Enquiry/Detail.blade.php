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
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="{{route('Enquiry.index')}}">Enquiry list</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">View Enquiry Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <div id="printableArea">
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
                                    <p>{{$enquiry->experience}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Country Interested</h5>
                                    <p>{{$enquiry->country_interested}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Service Interested</h5>
                                    <p>{{$enquiry->service_interested}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Enquiry From</h5>
                                    <p>{{$enquiry->enquiry_from}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Source</h5>
                                    <p>{{$enquiry->source}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Responded Through</h5>
                                    <p>{{$enquiry->responded_through}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Eligibility</h5>
                                    <p>{{$enquiry->eligibility}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Profession</h5>
                                    <p>{{@$enquiry->Category_Enquiry->Name}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Enquired Date</h5>
                                    <p>{{@$enquiry->Enquired_date}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Color Code</h5>
                                    <p>{{$enquiry->color_code}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Office Visited</h5>
                                    <p>{{@$enquiry->Office_visited}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Visited Date</h5>
                                    <p>{{@$enquiry->Visited_date}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="text-primary">Remarks</h5>
                                    <p>{{$enquiry->remarks}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            @if(Auth::user()->role=='Admin')
                                <form action="{{ route('Enquiry.edit',$enquiry->id)}}"
                                      method="GET"
                                      style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button class="btn btn-success" type="submit">Edit
                                    </button>
                                </form>
                                <form action="{{ route('Enquiry.destroy',$enquiry->id)}}"
                                      method="post" style="display: inline-block">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit">Delete
                                    </button>
                                </form>
                            @endif
                            <a href="{{route('Enquiry.index')}}" class="btn btn-primary">Back</a>
                            <button class="btn btn-info" onclick="printDiv('printableArea')">Print this page
                            </button>
                            <a target="_blank" href="{{ route('EnquiryDetailPdf',$enquiry->id) }}" class="btn btn-warning">Export Pdf</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
