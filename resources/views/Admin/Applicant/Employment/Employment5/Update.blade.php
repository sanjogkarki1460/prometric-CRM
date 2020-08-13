@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Update Applicant Employment</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('Employment5.index')}}">Applicant Employment
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant Employment Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('Employment5.update',$employment->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Applicant*</p>
                                    <select class="form-control form select2" id="applicant"
                                            style="height:34px;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled>select Appliant</option>
                                        @foreach($applicant as $applicant)
                                            <option @if($applicant->first_name==$app) selected
                                                    @endif value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Designation</p>
                                    <select class="form-control form select2" id="designation"
                                            style="height:34px;width:80%;margin-top: -20px;" name="designation">
                                        <option value="" selected disabled>select Designation</option>
                                        <option @if($employment->designation=='Mr.') selected @endif value="Mr.">Mr.
                                        </option>
                                        <option @if($employment->designation=='Mrs') selected @endif value="Mrs">Mrs
                                        </option>
                                        <option @if($employment->designation=='Miss') selected @endif value="Miss">
                                            Miss
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Nature of employment</p>
                                    <select class="form-control form select2" id="nature_of_employment"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="nature_of_employment">
                                        <option value="" selected disabled>select Nature of employment</option>
                                        <option @if($employment->nature_of_employment=='Full Time') selected
                                                @endif value="Full Time" class="form-control">Full Time
                                        </option>
                                        <option @if($employment->nature_of_employment=='Part Time') selected
                                                @endif value="Part Time" class="form-control">Part Time
                                        </option>
                                        <option @if($employment->nature_of_employment=='Online') selected
                                                @endif value="Online" class="form-control">Online
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">issuing authority
                                        country</p>
                                    <select class="form-control form select2" id="issuing_authority_country"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="issuing_authority_country">
                                        <option value="" selected disabled>select issuing authority country</option>
                                        <option @if($employment->issuing_authority_country=='Bangladesh') selected
                                                @endif value="Bangladesh" class="form-control">Bangladesh
                                        </option>
                                        <option @if($employment->issuing_authority_country=='Nepal') selected
                                                @endif value="Nepal" class="form-control">Nepal
                                        </option>
                                        <option @if($employment->issuing_authority_country=='India') selected
                                                @endif value="India" class="form-control">India
                                        </option>
                                        <option @if($employment->issuing_authority_country=='China') selected
                                                @endif value="China" class="form-control">China
                                        </option>
                                        <option @if($employment->issuing_authority_country=='Australia') selected
                                                @endif value="Australia" class="form-control">Australia
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority name</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_name}}" name="issuing_authority_name"
                                           placeholder="Enter Authority Name">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority address</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_address}}"
                                           name="issuing_authority_address" placeholder="Enter Authority address">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority city</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_city}}" name="issuing_authority_city"
                                           placeholder="Enter Authority city">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority state</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_state}}"
                                           name="issuing_authority_state" placeholder="Enter Authority state">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority country code</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_country_code}}"
                                           name="issuing_authority_country_code"
                                           placeholder="Enter Authority country code">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority phone number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_phone}}"
                                           name="issuing_authority_phone" placeholder="Enter Authority phone number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority email</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_email}}"
                                           name="issuing_authority_email" placeholder="Enter Authority email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Authority website</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->issuing_authority_website}}"
                                           name="issuing_authority_website" placeholder="Enter Authority website">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Reason for leaving</p>
                                    <textarea type="text" rows="5" class="form-control form"
                                              style="width:80%;margin-top:-20px;" name="reason_for_leaving">
                                        {{$employment->reason_for_leaving}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Employment From</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->employment_from}}" name="employment_from">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Employment To</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->employment_to}}" name="employment_to">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Employee code</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->employee_code}}" name="employee_code"
                                           placeholder="Enter Employee code">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Department</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$employment->department}}" name="department"
                                           placeholder="Enter Department">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Experience letter</p>
                                    <input type="file" class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="experience_letter">
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
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#applicant').select2({
                        placeholder: "Select a applicant"
                    });
                    $('#designation').select2({
                        placeholder: "Select a designation"
                    });
                    $('#nature_of_employment').select2({
                        placeholder: "Select a nature of employment"
                    });
                    $('#issuing_authority_country').select2({
                        placeholder: "Select a issuing authority country"
                    });
                });
            </script>
@endsection