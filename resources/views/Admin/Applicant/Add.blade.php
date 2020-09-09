@extends('Admin.Layout.master')
@section('main_content')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#enquiredyes").click(function () {
                $("#enquired_id1").removeClass('d-none');
            });
            $("#enquiredno").click(function () {
                $("#enquired_id1 ").addClass('d-none');
            });
        });
    </script>
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Add Applicant</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('Applicant.index')}}">Applicant View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('Applicant.store')}}" method="post" enctype="multipart/form-data">
                        c
                        <div class="container" style="margin-bottom:-20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Applicant Enquired*</p>
                                    <input required type="radio" name="enquired" id="enquiredyes" value="Yes">
                                    <label for="male">Yes</label>
                                    <input required type="radio" name="enquired" id="enquiredno" value="No">
                                    <label for="female">No</label>
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container d-none" id="enquired_id1">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Enquired Applicant</p>
                                    <select class="form-control form select2" id="enquired_id"
                                            style="height:50%;width:80%;margin-top: -20px;" name="enquired_id">
                                        <option value="" selected disabled>--select any one--</option>
                                        @foreach($enquiry as $enquiry)
                                            <option value="{{$enquiry->id}}">{{$enquiry->first_name}} {{$enquiry->middle_name}} {{$enquiry->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">First Name*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="first_name" placeholder="Enter First name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Last Name*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="surname" placeholder="Enter Last name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Middle Name*</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="middel_name" placeholder="Enter Middle name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Mobile Number*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="mobile_no" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Email*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Maiden Name*</p>
                                    <input  class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="maiden_name" placeholder="Enter Maiden Name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Gender*</p>
                                    <select required class="form-control form select2" id="gender"
                                            style="height:50%;width:80%;margin-top: -20px;" name="gender">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Date Of Birth*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="dob" placeholder="Enter Date of birth">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Identity Type*</p>
                                    <select required class="form-control form select2" id="identity_type"
                                            style="height:50%;width:80%;margin-top: -20px;" name="identity_type">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Citizen">Citizen</option>
                                        <option value="Passport">Passport</option>
                                        <option value="Both">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Identity Card No*</p>
                                    <input  class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="identity_card_no" placeholder="Enter Identity Card No">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport No*</p>
                                    <input  class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="passport_no" placeholder="Enter Passport No">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Nationality*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="nationality" placeholder="Enter Nationality">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport Docs*</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:37%;margin-top:-15px;"
                                           type="file" name="passport_docs" placeholder="Enter Passport Docs">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Applicant's Category*</p>
                                    <select required class="form-control form select2" id="category"
                                            style="height:50%;width:80%;margin-top: -20px;" name="applicant_category">
                                        <option value="" selected disabled>--select any one--</option>
                                        @foreach($category as $category)
                                            <option value="{{$category->id}}">{{$category->Name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="submit" style="margin-top: 20px;margin-bottom: 30px;">
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
                    $('#gender').select2({
                        placeholder: "Select a gender"
                    });
                    $('#identity_type').select2({
                        placeholder: "Select a identity type"
                    });
                    $('#enquired_id').select2({
                        placeholder: "Select a Enquiry"
                    });
                    $('#category').select2({
                        placeholder: "Select a category"
                    });
                });
            </script>
@endsection