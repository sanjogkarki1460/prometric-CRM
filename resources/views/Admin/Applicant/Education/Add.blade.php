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
                                                 href="{{route('CheckList.index')}}">Applicant CheckList
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant CheckList Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('Education.store')}}" method="post" enctype="multipart/form-data">
                        <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Select Applicant*</p>
                                    <select  class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled>select Appliant</option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">qualification</p>
                                    <select  class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" name="qualification">
                                        <option value="" selected disabled>select Qualification</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Masterd</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority country</p>
                                    <select  class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" name="authority_country">
                                        <option value="" selected disabled>select Authority country</option>
                                        <option value="Bangladesh" class="form-control">Bangladesh</option>
                                        <option value="Nepal" class="form-control">Nepal</option>
                                        <option value="India" class="form-control">India</option>
                                        <option value="China" class="form-control">China</option>
                                        <option value="Australia" class="form-control">Australia</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority name</p>
                                    <input type="text"  class="form-control form"
                                            style="height:34px;width:80%;margin-top: -20px;" name="authority_name" placeholder="Enter Authority Name">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority address</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_address" placeholder="Enter Authority address">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority city</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_city" placeholder="Enter Authority city">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority state</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_state" placeholder="Enter Authority state">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority country code</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_country_code" placeholder="Enter Authority country code">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority phone number</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_phone" placeholder="Enter Authority phone number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority email</p>
                                    <input  type="email"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_email" placeholder="Enter Authority email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority website</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_website" placeholder="Enter Authority website">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Institute</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="institution" placeholder="Enter Institute">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Mode</p>
                                    <select  class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" name="mode">
                                        <option value="" selected disabled>select Mode</option>
                                        <option value="Active Enrollment" class="form-control">Active Enrollment</option>
                                        <option value="Online Enrollment" class="form-control">Online Enrollment</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Major Subject</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="major_subject" placeholder="Enter Major Subject">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Minor Subject</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="minor_subject" placeholder="Enter Minor Subject">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Roll</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="roll" placeholder="Enter Roll">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Study From</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="study_from">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Study To</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="study_to">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Conferred Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="conferred_date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Degree Issue Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="degree_issue_date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Expected Degree Issue Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="expected_degree_issue_date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Qualification Certificate</p>
                                    <input type="file"  class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="qualification_certificate">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Marksheet</p>
                                    <input type="file"  class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="marksheet">
                                    </input>
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