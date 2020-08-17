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
                                            <th>Name of Person</th>
                                            <th>Phone Number</th>
                                            <th>Date of call</th>
                                            <th>Time of call</th>
                                            <th>Length of call</th>
                                            <th>Porpose of call</th>
                                            <th>Follow-Up Needed\Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($call as $call)
                                            <tr>
                                                @if($call->call_to=='Applicant')
                                                    <td>
                                                        <a href="{{route('ApplicantDetail',$call->applicant_id)}}">{{@$call->Applicant_Outgoing->first_name}} {{@$call->Applicant_Outgoing->middel_name}} {{@$call->Applicant_Outgoing->surname}}</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="{{route('EnquiryDetail',$call->enquiry_id)}}">{{@$call->Enquiry_Outgoing->first_name}} {{@$call->Enquiry_Outgoing->middle_name}} {{@$call->Enquiry_Outgoing->last_name}}</a>
                                                    </td>
                                                @endif
                                                <td>{{$call->phone}}</td>
                                                <td>{{$call->date}}</td>
                                                <td>{{date('h:i A',strtotime($call->time))}}</td>
                                                <td>{{@$call->length}}</td>
                                                <td>{{@$call->porpose}}</td>
                                                <td>{{@$call->remarks}}</td>
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