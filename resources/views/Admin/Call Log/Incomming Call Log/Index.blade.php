@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Incoming Call Log</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Incoming Call Log</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Incoming Call Log Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('IncomingCallLog.create')}}" class="btn btn-success fa fa-plus">Add
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
                                            <th style="font-size:13px; ">Received_by</th>
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
                                                @if($call->call_by=='Applicant')
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('ApplicantDetail',@$call->applicant_id)}}">{{@$call->Applicant_Incomming->first_name}} {{@$call->Applicant_Incomming->middel_name}} {{@$call->Applicant_Incomming->surname}}</a>
                                                    </td>
                                                    @endif
                                                @if($call->call_by=='Enquiry')
                                                    <td style="font-size:13px; ">
                                                        <a href="{{route('EnquiryDetail',$call->enquiry_id)}}">{{@$call->Enquiry_Incomming->first_name}} {{@$call->Enquiry_Incomming->middle_name}} {{@$call->Enquiry_Incomming->last_name}}</a>
                                                    </td>
                                                @endif

                                                @if($call->call_by==null)
                                                    <td></td>
                                                @endif
                                                <td style="font-size:13px; ">{{$call->received_by}}</td>
                                                <td style="font-size:13px; ">{{$call->phone}}</td>
                                                <td style="font-size:13px; ">{{$call->date}}</td>
                                                <td style="font-size:13px; ">{{date('h:i A',strtotime($call->time))}}</td>
                                                <td style="font-size:13px; ">{{@$call->length}}</td>
                                                <td style="font-size:13px; ">{{@$call->purpose}}</td>
                                                <td style="font-size:13px; ">{{@$call->remarks}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('IncomingCallLog.edit', $call->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('IncomingCallLog.destroy', $call->id)}}"
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