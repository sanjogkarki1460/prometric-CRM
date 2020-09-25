@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Outgoing Call Log</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Outgoing Call Log</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Outgoing Call Log Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('OutgoingCallLog.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px; ">ID</th>
                                            <th style="font-size:13px; ">Name of Person</th>
                                            <th style="font-size:13px; ">Call By</th>
                                            <th style="font-size:13px; ">Phone Number</th>
                                            <th style="font-size:13px; ">Date of call</th>
                                            <th style="font-size:13px; ">Time of call</th>
                                            <th style="font-size:13px; ">Length of call</th>
                                            <th style="font-size:13px; ">Purpose of call</th>
                                            <th style="font-size:13px; ">Follow-Up Needed\Remarks</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:13px; ">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($call as $call)
                                            <tr>
                                                <td style="font-size:13px; ">{{$call->id}}</td>
                                                @if($call->call_to=='Applicant')
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('ApplicantDetail',$call->applicant_id)}}">{{@$call->Applicant_Outgoing->first_name}} {{@$call->Applicant_Outgoing->middle_name}} {{@$call->Applicant_Outgoing->last_name}}</a>
                                                    </td>
                                                @endif
                                                @if($call->call_to=='Enquiry')
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('EnquiryDetail',$call->enquiry_id)}}">{{@$call->Enquiry_Outgoing->first_name}} {{@$call->Enquiry_Outgoing->middle_name}} {{@$call->Enquiry_Outgoing->last_name}}</a>
                                                    </td>
                                                @endif
                                                @if($call->call_to==null)
                                                    <td></td>
                                                @endif
                                                <td style="font-size:13px; ">{{$call->call_by}}</td>
                                                <td style="font-size:13px; ">{{$call->phone}}</td>
                                                <td style="font-size:13px; ">{{$call->date}}</td>
                                                <td style="font-size:13px; ">{{date('h:i A',strtotime($call->time))}}</td>
                                                <td style="font-size:13px; ">{{@$call->length}}</td>
                                                <td style="font-size:13px; ">{{@$call->purpose}}</td>
                                                <td style="font-size:13px; ">{{@$call->remarks}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('OutgoingCallLog.edit', $call->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('OutgoingCallLog.destroy', $call->id)}}"
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