@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Add Applicant Appointment</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('ApplicantAppointment.index')}}">Applicant Appointment
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant Appointment Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('ApplicantAppointment.store')}}" method="post" enctype="multipart/form-data">
                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 40px;">Select Applicant*</p>
                                    <select required class="form-control form select2" id="applicant"
                                            style="height:50%;width:80%;margin-top: -15px;" name="applicant_id">
                                        <option value="" selected disabled></option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 1px;">Appointment With*</p>
                                    <select required class="form-control form select2" id="appointment"
                                            style="height:50%;width:80%;margin-top: -15px;" name="appointment_with">
                                        <option value="" selected disabled></option>
                                        @foreach($admin as $admin)
                                            <option value="{{$admin->id}}">{{$admin->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Appointment Date*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Appointment time*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="time" name="time">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks*</p>
                                    <textarea  class="form form-control"
                                           style="width: 80%;margin-top:-15px;" rows="5"
                                              type="time" name="remarks"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit" style="margin-top: 40px;margin-bottom: 30px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#applicant').select2({
                        allowClear:true,
                        placeholder: "Select a applicant"
                    });
                    $('#appointment').select2({
                        allowClear:true,
                        placeholder: "Select a appointment with"
                    });

                });
            </script>
@endsection