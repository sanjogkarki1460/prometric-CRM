@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Dashboard</div>
                        </div>
                    </div>
                </div>
                <div class="state-overview">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-green">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">group</i></span>
                                <div class="info-box-content">
                                    <span>Total Applicant:</span>
                                    <span class="info-box-number">{{$applicant}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">group</i></span>
                                <div class="info-box-content">
                                    <span>Total Applicant This Month:</span>
                                    <span class="info-box-number">{{$applicantthismonth}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-blue">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total Enquiry:</span>
                                    <span class="info-box-number">{{$enquiry}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-info">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total Enquiry This Month:</span>
                                    <span class="info-box-number">{{$enquirythismonth}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-yellow">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content ">
                                    <span>Total SMS TO Applicant:</span>
                                    <span class="info-box-number">{{$applicantSMS}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-pink">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total SMS TO Enquiry:</span>
                                    <span class="info-box-number">{{$enquirySMS}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Today's Enquiry Appointment Detail Table</header>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px; ">Enquiry</th>
                                            <th style="font-size:13px; ">Appointment Date</th>
                                            <th style="font-size:13px; ">Appointment Time</th>
                                            <th style="font-size:13px; ">Appointment With</th>
                                            <th style="font-size:13px; ">Remarks</th>
                                            <th style="font-size:13px; ">Enquiry's Contact No.</th>
                                            <th style="font-size:13px; ">Enquiry'S Email</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:13px; ">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($todaysEnquiryAppointment as $appointment)
                                            <tr>
                                                <td style="font-size:13px;"><a
                                                            href="{{route('EnquiryDetail',$appointment->enquiry_id)}}">{{$appointment->Enquiry_Appointment->first_name}} {{$appointment->Enquiry_Appointment->middle_name}} {{$appointment->Enquiry_Appointment->last_name}}</a>
                                                </td>
                                                <td style="font-size:13px;">{{$appointment->date}}</td>
                                                <td style="font-size:13px;">{{date('h:i A',strtotime($appointment->time))}}</td>
                                                @if(Auth::user()->id==$appointment->appointment_with)
                                                    <td>You</td>
                                                @else
                                                    <td>{{$appointment->Enquiry_Admin->name}}</td>
                                                @endif
                                                <td style="font-size:13px;">{{$appointment->remarks}}</td>
                                                <td style="font-size:13px;">{{$appointment->Enquiry_Appointment->phone}}</td>
                                                <td style="font-size:13px;">{{$appointment->Enquiry_Appointment->email}}</td>
                                                @if(Auth::user()->role=='Admin')
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Today's Applicant Appointment Detail Table</header>

                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:13px;">Applicant</th>
                                            <th style="font-size:13px;">Appointment Date</th>
                                            <th style="font-size:13px;">Appointment Time</th>
                                            <th style="font-size:13px; ">Appointment With</th>
                                            <th style="font-size:13px;">Remarks</th>
                                            <th style="font-size:13px;">Applicant's Contact No.</th>
                                            <th style="font-size:13px;">APPLICANT'S Email</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:13px;">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($todaysApplicantAppointment as $appointment)
                                            <tr>
                                                <td style="font-size:13px;"><a
                                                            href="{{route('ApplicantDetail',$appointment->applicant_id)}}">{{$appointment->Applicant_Appointment->first_name}} {{$appointment->Applicant_Appointment->middle_name}} {{$appointment->Applicant_Appointment->last_name}}</a>
                                                </td>
                                                <td style="font-size:13px;">{{$appointment->date}}</td>
                                                <td style="font-size:13px;">{{date('h:i A',strtotime($appointment->time))}}</td>
                                                @if(Auth::user()->id==$appointment->appointment_with)
                                                    <td>You</td>
                                                @else
                                                    <td>{{$appointment->Applicant_Admin->name}}</td>
                                                @endif
                                                <td style="font-size:13px;">{{$appointment->remarks}}</td>
                                                <td style="font-size:13px;">{{$appointment->Applicant_Appointment->phone}}</td>
                                                <td style="font-size:13px;">{{$appointment->Applicant_Appointment->email}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('ApplicantAppointment.edit', $appointment->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('ApplicantAppointment.destroy', $appointment->id)}}"
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
@endsection