@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Add Applicant CheckList</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('CheckList.index')}}">Applicant CheckList View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant CheckList Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('CheckList.store')}}" method="post" enctype="multipart/form-data">
                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 40px;">Select Applicant*</p>
                                    <select required class="form-control form"
                                            style="height:50%;width:80%;margin-top: -15px;" name="applicant_id">
                                        <option  value="" selected disabled>--select any one--</option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label" for="name">password_citizenship_certificate</label>
                                    <input type="checkbox" name="password_citizenship_certificate" id="a1"
                                           class="toggleswitch" value="Yes">

                                    <br>
                                    <label class="control-label" for="name">slc_certificate</label>
                                    <input type="checkbox" name="slc_certificate" class="toggleswitch" id="a2" value="Yes">

                                    <br>
                                    <label class="control-label" for="name">plus_two_isc_pcl_certificate</label>
                                    <input type="checkbox" name="plus_two_isc_pcl_certificate" id="a3" value="Yes">
                                    <br>

                                    <label class="control-label" for="name">diploma_degree_certificate</label>
                                    <input type="checkbox" name="diploma_degree_certificate" id="a4" value="Yes">
                                    <br>
                                    <label class="control-label"
                                           for="name">mark_sheet_of_each_year_final_transcript</label>
                                    <input type="checkbox" name="mark_sheet_of_each_year_final_transcript" id="a5"
                                           value="Yes">
                                    <br>
                                    <label class="control-label" for="name">equivalent_certificate</label>
                                    <input type="checkbox" name="equivalent_certificate" id="a6" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">council_registration_certificate</label>
                                    <input type="checkbox" name="council_registration_certificate" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label"
                                           for="name">council_registration_certificate_renew</label>
                                    <input type="checkbox" name="council_registration_certificate_renew" id="a8"
                                           value="Yes">
                                    <br>
                                    <label class="control-label" for="name">good_standing_letter_from_council</label>
                                    <input type="checkbox" name="good_standing_letter_from_council" id="a9" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">work_experience_letter_till_date</label>
                                    <input type="checkbox" name="work_experience_letter_till_date" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">basic_life_support_for_nurses</label>
                                    <input type="checkbox" name="basic_life_support_for_nurses" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">mrp_size_photo_in_white_background</label>
                                    <input type="checkbox" name="mrp_size_photo_in_white_background" id="a12" value="Yes">

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

@endsection