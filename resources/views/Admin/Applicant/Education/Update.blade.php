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
                    <form action="{{route('Education.update',$education->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input  type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Applicant*</p>
                                    <select  class="form-control form select2"
                                             style="height:34px;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled>select Appliant</option>
                                        @foreach($applicant as $applicant)
                                            <option @if($education->applicant_id==$app) selected @endif value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px; margin-bottom: 2px;">qualification</p>
                                    <select  class="form-control form select2"
                                             style="height:34px;width:80%;margin-top: -20px;" name="qualification">
                                        <option value="" selected disabled>select Qualification</option>
                                        <option @if($education->qualification=='Diploma') selected @endif value="Diploma">Diploma</option>
                                        <option @if($education->qualification=='Bachelor') selected @endif value="Bachelor">Bachelor</option>
                                        <option @if($education->qualification=='Master') selected @endif value="Master">Masterd</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Authority country</p>
                                    <select  class="form-control form select2"
                                             style="height:34px;width:80%;margin-top: -20px;" name="authority_country">
                                        <option value="" selected disabled>select Authority country</option>
                                        <option @if($education->authority_country=='Bangladesh') selected @endif value="Bangladesh" class="form-control">Bangladesh</option>
                                        <option @if($education->authority_country=='Nepal') selected @endif value="Nepal" class="form-control">Nepal</option>
                                        <option @if($education->authority_country=='India') selected @endif value="India" class="form-control">India</option>
                                        <option @if($education->authority_country=='China') selected @endif value="China" class="form-control">China</option>
                                        <option @if($education->authority_country=='Australia') selected @endif value="Australia" class="form-control">Australia</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority name</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_name" placeholder="Enter Authority Name" value="{{$education->authority_name}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority address</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_address" placeholder="Enter Authority address" value="{{$education->authority_address}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority city</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_city" placeholder="Enter Authority city" value="{{$education->authority_city}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority state</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_state" placeholder="Enter Authority state" value="{{$education->authority_state}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority country code</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_country_code" placeholder="Enter Authority country code" value="{{$education->authority_country_code}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority phone number</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_phone" placeholder="Enter Authority phone number" value="{{$education->authority_phone}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority email</p>
                                    <input  type="email"  class="form-control form"
                                            style="height:34px;width:80%;margin-top: -20px;" name="authority_email" placeholder="Enter Authority email" value="{{$education->authority_email}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority website</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="authority_website" placeholder="Enter Authority website" value="{{$education->authority_website}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Institute</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="institution" placeholder="Enter Institute" value="{{$education->institution}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Mode</p>
                                    <select  class="form-control form select2"
                                             style="height:34px;width:80%;margin-top: -20px;" name="mode">
                                        <option value="" selected disabled>select Mode</option>
                                        <option @if($education->mode=='Active Enrollment') selected @endif value="Active Enrollment" class="form-control">Active Enrollment</option>
                                        <option @if($education->mode=='Online Enrollment') selected @endif value="Online Enrollment" class="form-control">Online Enrollment</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Major Subject</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="major_subject" placeholder="Enter Major Subject" value="{{$education->major_subject}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Minor Subject</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="minor_subject" placeholder="Enter Minor Subject" value="{{$education->minor_subject}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Roll</p>
                                    <input type="text"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="roll" placeholder="Enter Roll" value="{{$education->roll}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Study From</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="study_from" value="{{$education->study_from}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Study To</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="study_to" value="{{$education->study_to}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Conferred Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="conferred_date" value="{{$education->conferred_date}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Degree Issue Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="degree_issue_date" value="{{$education->degree_issue_date}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Expected Degree Issue Date</p>
                                    <input type="date"  class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="expected_degree_issue_date" value="{{$education->expected_degree_issue_date}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Qualification Certificate</p>
                                    <input type="file"  class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="qualification_certificate" value="{{$education->qualification_level}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Marksheet</p>
                                    <input type="file"  class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="marksheet" value="{{$education->marksheet}}">
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