@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Enquiry Appointment Detail</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Enquiry Appointment Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Enquiry Appointment Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('EnquiryAppointment.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Enquiry</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>Remarks</th>
                                            <th>Enquiry's Contact No.</th>
                                            <th>Enquiry'S Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($appointment as $appointment)
                                            <tr>
                                                <td>{{$appointment->Enquiry_Appointment->first_name}} {{$appointment->Enquiry_Appointment->middle_name}} {{$appointment->Enquiry_Appointment->last_name}}</td>
                                                <td>{{$appointment->date}}</td>
                                                <td>{{date('h:i A',strtotime($appointment->time))}}</td>
                                                <td>{{$appointment->remarks}}</td>
                                                <td>{{$appointment->Enquiry_Appointment->phone}}</td>
                                                <td>{{$appointment->Enquiry_Appointment->email}}</td>
                                                <td class="text-left">
                                                    <form action="{{ route('EnquiryAppointment.edit', $appointment->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('EnquiryAppointment.destroy', $appointment->id)}}"
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