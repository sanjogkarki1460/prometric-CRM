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
                                    <select required class="form-control form select2" id="applicant"
                                            style="height:50%;width:80%;margin-top: -15px;" name="applicant_id">
                                        <option  value="" selected disabled></option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label" for="name">MRP Size Photo</label>
                                    <input type="checkbox" name="mrp_size_photo" id="a12" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Passport</label>
                                    <input type="checkbox" name="passport" id="a1"
                                           class="toggleswitch" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Citizen</label>
                                    <input type="checkbox" name="citizen" id="a1"
                                           class="toggleswitch" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">SLC Marksheet</label>
                                    <input type="checkbox" name="slc_marksheet" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">SLC Certificate</label>
                                    <input type="checkbox" name="slc_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">SLC Character Certificate</label>
                                    <input type="checkbox" name="slc_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">+2 Transcript</label>
                                    <input type="checkbox" name="plus2transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">+2 Certificate</label>
                                    <input type="checkbox" name="plus2certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">+2 Character Certificate</label>
                                    <input type="checkbox" name="plus2character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">PCL/Diploma Transcript</label>
                                    <input type="checkbox" name="diploma_transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">PCL/Diploma Certificate</label>
                                    <input type="checkbox" name="diploma_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">PCL/Diploma Character Certificate</label>
                                    <input type="checkbox" name="diploma_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Bachelor Transcript</label>
                                    <input type="checkbox" name="bachelor_transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Bachelor Certificate</label>
                                    <input type="checkbox" name="bachelor_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Bachelor Character Certificate</label>
                                    <input type="checkbox" name="bachelor_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Master Transcript</label>
                                    <input type="checkbox" name="master_transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Master Certificate</label>
                                    <input type="checkbox" name="master_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Master Character Certificate</label>
                                    <input type="checkbox" name="master_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Internship Completion Certificate</label>
                                    <input type="checkbox" name="internship_completion_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Equivalent Certificate</label>
                                    <input type="checkbox" name="equivalent_certificate" id="a6" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Council Registration Certificate Front</label>
                                    <input type="checkbox" name="council_registration_certificate_front" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Council Registration Certificate Back</label>
                                    <input type="checkbox" name="council_registration_certificate_back" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Council Good Standing Letter</label>
                                    <input type="checkbox" name="council_good_standing_letter" id="a9" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Work Experience Letter 1</label>
                                    <input type="checkbox" name="work_experience_letter1" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Work Experience Letter 2</label>
                                    <input type="checkbox" name="work_experience_letter2" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Work Experience Letter 3</label>
                                    <input type="checkbox" name="work_experience_letter3" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Work Experience Letter 4</label>
                                    <input type="checkbox" name="work_experience_letter4" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Work Experience Letter 5</label>
                                    <input type="checkbox" name="work_experience_letter5" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Basic Life Support For Certificate</label>
                                    <input type="checkbox" name="basic_life_support_certificate" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Signed Letter of Authorization</label>
                                    <input type="checkbox" name="signed_letter_authorization" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">Signed Service Agreement</label>
                                    <input type="checkbox" name="signed_service_agreement" id="a11" value="Yes">
                                    <br>
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
                        placeholder: "Select a Applicant"
                    });

                });
            </script>
@endsection