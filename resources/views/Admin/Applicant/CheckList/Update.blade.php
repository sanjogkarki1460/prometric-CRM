@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Update Applicant CheckList</div>
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
                                <li class="active">Applicant CheckList Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('CheckList.update',$checklist->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{--@if($checklist->password_citizenship_certificate=='Yes') Checked @endif--}}
                        <input  type="hidden" name="_method" value="put">
                        <input class="d-none" type="hidden" name="applicant_id" readonly value="{{$checklist->applicant_id}}">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label">MRP Size Photo</label>
                                    <input type="checkbox" @if($checklist->mrp_size_photo=='Yes') checked @endif name="mrp_size_photo" id="a12" value="Yes">
                                    <br>
                                    <label class="control-label">Passport</label>
                                    <input type="checkbox" @if($checklist->passport=='Yes') checked @endif name="passport" id="a1"
                                           class="toggleswitch" value="Yes">
                                    <br>
                                    <label class="control-label">Citizen</label>
                                    <input type="checkbox" @if($checklist->citizen=='Yes') checked @endif name="citizen" id="a1"
                                           class="toggleswitch" value="Yes">
                                    <br>
                                    <label class="control-label">SLC Marksheet</label>
                                    <input type="checkbox" @if($checklist->slc_marksheet=='Yes') checked @endif name="slc_marksheet" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">SLC Certificate</label>
                                    <input type="checkbox" @if($checklist->slc_certificate=='Yes') checked @endif name="slc_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">SLC Character Certificate</label>
                                    <input type="checkbox" @if($checklist->slc_character_certificate=='Yes') checked @endif name="slc_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">+2 Transcript</label>
                                    <input type="checkbox" @if($checklist->plus2transcript=='Yes') checked @endif name="plus2transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">+2 Certificate</label>
                                    <input type="checkbox" @if($checklist->plus2certificate=='Yes') checked @endif name="plus2certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">+2 Character Certificate</label>
                                    <input type="checkbox" @if($checklist->plus2character_certificate=='Yes') checked @endif name="plus2character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">PCL/Diploma Transcript</label>
                                    <input type="checkbox" @if($checklist->diploma_transcript=='Yes') checked @endif name="diploma_transcript" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">PCL/Diploma Certificate</label>
                                    <input type="checkbox" @if($checklist->diploma_certificate=='Yes') checked @endif name="diploma_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">PCL/Diploma Character Certificate</label>
                                    <input type="checkbox" @if($checklist->diploma_character_certificate=='Yes') checked @endif name="diploma_character_certificate" class="toggleswitch" id="a2" value="Yes">
                                    <br>
                                    <label class="control-label">Equivalent Certificate</label>
                                    <input type="checkbox" @if($checklist->equivalent_certificate=='Yes') checked @endif name="equivalent_certificate" id="a6" value="Yes">
                                    <br>
                                    <label class="control-label">Council Registration Certificate Front</label>
                                    <input type="checkbox" @if($checklist->council_registration_certificate_front=='Yes') checked @endif name="council_registration_certificate_front" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label">Council Registration Certificate Back</label>
                                    <input type="checkbox" @if($checklist->council_registration_certificate_back=='Yes') checked @endif name="council_registration_certificate_back" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label">Council Good Standing Letter</label>
                                    <input type="checkbox" @if($checklist->council_good_standing_letter=='Yes') checked @endif name="council_good_standing_letter" id="a9" value="Yes">
                                    <br>
                                    <label class="control-label">Work Experience Letter 1</label>
                                    <input type="checkbox" @if($checklist->work_experience_letter1=='Yes') checked @endif name="work_experience_letter1" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label">Work Experience Letter 2</label>
                                    <input type="checkbox" @if($checklist->work_experience_letter2=='Yes') checked @endif name="work_experience_letter2" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label">Work Experience Letter 3</label>
                                    <input type="checkbox" @if($checklist->work_experience_letter3=='Yes') checked @endif name="work_experience_letter3" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label">Basic Life Support For Certificate</label>
                                    <input type="checkbox" @if($checklist->basic_life_support_certificate=='Yes') checked @endif name="basic_life_support_certificate" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label">Signed Letter of Authorization</label>
                                    <input type="checkbox" @if($checklist->signed_letter_authorization=='Yes') checked @endif name="signed_letter_authorization" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label">Signed Service Agreement</label>
                                    <input type="checkbox" @if($checklist->signed_service_agreement=='Yes') checked @endif name="signed_service_agreement" id="a11" value="Yes">
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
                        placeholder: "Select a applicant"
                    });

                });
            </script>
@endsection