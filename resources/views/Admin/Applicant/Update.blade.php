@extends('Admin.Layout.master')
@section('main_content')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#gender').select2({
                placeholder: "Select a Gender"
            });
            $('#identity_type').select2({
                placeholder: "Select a Identification Document Type"
            });
            $('#status').select2({
                placeholder: "Select a Status"
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
                    <form action="{{route('Applicant.update',$applicant->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input required type="hidden" name="_method" value="put">
                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="first_name" placeholder="Enter Last Name"
                               value="{{@$applicant->first_name}}">
                        <input required class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="last_name" placeholder="Enter Last Name"
                               value="{{@$applicant->last_name}}">

                        <input class="form form-control"
                               style="width: 80%;height:34px;margin-top:-15px;"
                               type="hidden" name="middle_name" placeholder="Enter Middle Name"
                               value="{{@$applicant->middle_name}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Maiden Name</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="maiden_name" placeholder="Enter Maiden Name" value="{{$applicant->maiden_name}}">
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
                                        <option @if($applicant->gender=='Male') selected @endif value="Male">Male</option>
                                        <option @if($applicant->gender=='Female') selected @endif value="Female">Female</option>
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
                                           type="date" name="dob" placeholder="Enter Date of birth" value="{{$applicant->dob}}">
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
                                        <option  @if($applicant->identity_type=='Citizen') selected @endif value="Citizen">Citizen</option>
                                        <option  @if($applicant->identity_type=='Passport') selected @endif value="Passport">Passport</option>
                                        <option  @if($applicant->identity_type=='Both') selected @endif value="Both">Both</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Citizenship  No.</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="citizen_no" placeholder="Enter Citizenship  No." value="{{$applicant->citizen_no}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport No.</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="passport_no" placeholder="Enter Passport No." value="{{$applicant->passport_no}}">
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
                                           type="text" name="nationality" placeholder="Enter Nationality" value="{{$applicant->nationality}}">
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
                                        <option @if($applicant->status=='New')  selected @endif value="New">New</option>
                                        <option @if($applicant->status=='In Progress')  selected @endif value="In Progress">In Progress</option>
                                        <option @if($applicant->status=='Waiting for test')  selected @endif value="Waiting for test">Waiting for test</option>
                                        <option @if($applicant->status=='Wating for result') selected @endif  value="Wating for result">Wating for result</option>
                                        <option @if($applicant->status=='Completed') selected @endif  value="Completed">Completed</option>
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
                                              type="text" name="remarks" placeholder="Enter Remarks">{{$applicant->remarks}}</textarea>
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

@endsection