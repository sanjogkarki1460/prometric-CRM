@extends('Admin.Layout.master')
@section('main_content')
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
                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="first_name" placeholder="Enter Last Name"
                               value="{{@$applicantenquiry->first_name}}">
                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="last_name" placeholder="Enter Last Name"
                               value="{{@$applicantenquiry->last_name}}">

                        <input class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="middle_name" placeholder="Enter Middle Name"
                               value="{{@$applicantenquiry->middle_name}}">

                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="phone" placeholder="Enter Mobile Number"
                               value="{{@$applicantenquiry->phone}}">

                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="email" placeholder="Enter Email"
                               value="{{@$applicantenquiry->email}}">

                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="address" placeholder="Enter Address"
                               value="{{@$applicantenquiry->address}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="subject" placeholder="Enter Address"
                               value="{{@$applicantenquiry->subject}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="Category_id" placeholder="Enter Address"
                               value="{{@$applicantenquiry->Category_id}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="qualification_level" placeholder="Enter Address"
                               value="{{@$applicantenquiry->qualification_level}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="experience" placeholder="Enter Address"
                               value="{{@$applicantenquiry->experience}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="country_interested" placeholder="Enter Address"
                               value="{{@$applicantenquiry->country_interested}}">
                        <input required class="form form-control form-body"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="service_interested" placeholder="Enter Address"
                               value="{{@$applicantenquiry->service_interested}}">
                        <input class="form form-control"
                               style="width: 80%;height:37%;margin-top:-15px;"
                               type="hidden" name="color_code" value="{{@$applicantenquiry->color_code}}">
                        <h2 class="text-center">Add {{@$applicantenquiry->first_name}} {{@$applicantenquiry->middle_name}} {{@$applicantenquiry->last_name}} to Applicant List</h2>
                        <h3 class="container text-primary" style="text-decoration: underline">Additional Information</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Upload Passport</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:37%;margin-top:-15px;"
                                           type="file" name="pp_photo" placeholder="Enter Passport Docs">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Maiden Name</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="maiden_name" placeholder="Enter Maiden Name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 5px;">Gender<span
                                                class="text-danger">*</span></p>
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
                                    <p class="ah1" style="margin-top: 20px;">Date of Birth<span
                                                class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="dob" placeholder="Enter Date of birth">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Identification Document Type<span
                                                class="text-danger">*</span></p>
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
                                    <p class="ah1" style="margin-top: 20px;">Citizenship Card No.</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="citizen_no" placeholder="Enter Citizenship Card No.">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport No.</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="passport_no" placeholder="Enter Passport No.">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Nationality<span
                                                class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="nationality" placeholder="Enter Nationality">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Upload Passport</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:37%;margin-top:-15px;"
                                           type="file" name="passport_docs" placeholder="Enter Passport Docs">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Status<span class="text-danger">*</span>
                                    </p>
                                    <select required class="form-control form select2" id="status"
                                            style="height:50%;width:80%;margin-top: -20px;" name="status">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="New">New</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Waiting for test">Waiting for test</option>
                                        <option value="Wating for result">Wating for result</option>
                                        <option value="Completed(Pass)">Completed(Pass)</option>
                                        <option value="Completed(Fail)">Completed(Fail)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks</p>
                                    <textarea class="form form-control" style="width:80%;margin-top:-15px;"
                                              rows="5"
                                              type="text" name="remarks" placeholder="Enter Remarks"></textarea>
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
                        placeholder: "Select a Gender"
                    });
                    $('#identity_type').select2({
                        placeholder: "Select a Identification Document Type"
                    });
                    $('#enquired_id').select2({
                        placeholder: "Select a Enquiry"
                    });
                    $('#category').select2({
                        placeholder: "Select a Category"
                    });
                    $('#status').select2({
                        placeholder: "Select a Status"
                    });
                });
            </script>
@endsection