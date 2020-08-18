@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Visitor Log</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Visitor Log</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Visitor Log Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('VisitorLog.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px; ">ID</th>
                                            <th style="font-size:13px; ">Name of Visitor</th>
                                            <th style="font-size:13px; ">Date of Visit</th>
                                            <th style="font-size:13px; ">Time of Visit</th>
                                            <th style="font-size:13px; ">Phone Number</th>
                                            <th style="font-size:13px; ">Email</th>
                                            <th style="font-size:13px; ">Purpose of Visit</th>
                                            <th style="font-size:13px; ">Follow-Up Needed\Remarks</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:13px; ">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($visitorlog as $visitorlog)
                                            <tr>
                                                <td style="font-size:13px; ">{{$visitorlog->id}}</td>
                                                @if($visitorlog->visited_by=='Applicant')
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('ApplicantDetail',$visitorlog->applicant_id)}}">{{@$visitorlog->Applicant_Visitor->first_name}} {{@$visitorlog->Applicant_Visitor->middel_name}} {{@$visitorlog->Applicant_Visitor->surname}}</a>
                                                    </td>
                                                @else
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('EnquiryDetail',$visitorlog->enquiry_id)}}">{{@$visitorlog->Enquiry_Visitor->first_name}} {{@$visitorlog->Enquiry_Visitor->middle_name}} {{@$visitorlog->Enquiry_Visitor->last_name}}</a>
                                                    </td>
                                                @endif
                                                <td style="font-size:13px; ">{{$visitorlog->date}}</td>
                                                <td style="font-size:13px; ">{{date('h:i A',strtotime($visitorlog->time))}}</td>
                                                @if($visitorlog->visited_by=='Applicant')
                                                    <td style="font-size:13px; ">
                                                        {{@$visitorlog->Applicant_Visitor->mobile_no}}
                                                    </td>
                                                @else
                                                    <td style="font-size:13px; ">
                                                        {{@$visitorlog->Enquiry_Visitor->phone}}
                                                    </td>
                                                @endif
                                                @if($visitorlog->visited_by=='Applicant')
                                                    <td style="font-size:13px; ">
                                                        {{@$visitorlog->Applicant_Visitor->email}}
                                                    </td>
                                                @else
                                                    <td style="font-size:13px; ">
                                                        {{@$visitorlog->Enquiry_Visitor->email}}
                                                    </td>
                                                @endif
                                                <td style="font-size:13px; ">{{@$visitorlog->purpose}}</td>
                                                <td style="font-size:13px; ">{{@$visitorlog->remarks}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('VisitorLog.edit', $visitorlog->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('VisitorLog.destroy', $visitorlog->id)}}"
                                                              method="post" style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-danger btn-sm" type="submit">Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
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