@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Enquiry List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Enquiry View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Enquiry Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('Enquiry.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>FIRST NAME</th>
                                            <th>MIDDLE NAME</th>
                                            <th>LAST NAME</th>
                                            <th>EmaiL</th>
                                            <th>Phone</th>
                                            <th>ADDRESS</th>
                                            <th>SUBJECT</th>
                                            <th>QUALIFICATION TABLE</th>
                                            <th>EXPERIENCE</th>
                                            <th>COUNTRY INTRESTED</th>
                                            <th>SERVICE INTRESTED</th>
                                            <th>ENQUIRY FORM</th>
                                            <th>SOURCE</th>
                                            <th>REMARKS</th>
                                            <th>RESPONDED THROUGH</th>
                                            <th>eligibility</th>
                                            <th>CATEGORY</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($enquiry as $enquiry)
                                            <tr>
                                                <td>{{$enquiry->id}}</td>
                                                <td>{{$enquiry->first_name}}</td>
                                                <td>{{$enquiry->last_name}}</td>
                                                <td>{{$enquiry->middle_name}}</td>
                                                <td>{{$enquiry->email}}</td>
                                                <td>{{$enquiry->phone}}</td>
                                                <td>{{$enquiry->address}}</td>
                                                <td>{{$enquiry->subject}}</td>
                                                <td>{{$enquiry->qualification_level}}</td>
                                                <td>{{$enquiry->experience}}</td>
                                                <td>{{$enquiry->country_interested}}</td>
                                                <td>{{$enquiry->service_interested}}</td>
                                                <td>{{$enquiry->enquiry_from}}</td>
                                                <td>{{$enquiry->source}}</td>
                                                <td>{{$enquiry->remarks}}</td>
                                                <td>{{$enquiry->responded_through}}</td>
                                                <td>{{$enquiry->eligibility}}</td>
                                                <td>{{$enquiry->Category_Enquiry->Name}}</td>
                                                <td class="text-left">
                                                    <form action="{{ route('Enquiry.edit',$enquiry->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form  action="{{ route('Enquiry.destroy',$enquiry->id)}}"
                                                          method="post" style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit" >Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection