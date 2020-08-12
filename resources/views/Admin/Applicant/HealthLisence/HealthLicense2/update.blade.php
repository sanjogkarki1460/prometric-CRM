@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Update Applicant Health License</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('HealthLicense2.index')}}">Applicant Health License
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant Health License Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('HealthLicense2.update',$healthlisence->id)}}" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Applicant*</p>
                                    <select class="form-control form select2" id="applicant"
                                            style="height:34px;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled>select</option>
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
                                    <p class="ah1" style="margin-top: 20px;">Professional Designation</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="professional_designation" placeholder="Enter Professional Designation"
                                           value="{{$healthlisence->professional_designation}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Issuing Authority Name</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="issuing_authority_name" placeholder="Enter Issuing Authority Name"
                                           value="{{$healthlisence->issuing_authority_name}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;margin-bottom: 2px;">
                                        Issuing Authority Country*</p>
                                    <select class="form-control form select2" id="authority_country"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="issuing_authority_country">
                                        <option value="" selected disabled>select Authority Country</option>
                                        <option @if($healthlisence->issuing_authority_country=='Bangladesh') selected
                                                @endif value="Bangladesh">Bangladesh
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Belgium') selected
                                                @endif value="Belgium">Belgium
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Burkina Faso') selected
                                                @endif value="Burkina Faso">Burkina Faso
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Bulgaria') selected
                                                @endif value="Bulgaria">Bulgaria
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Bosnia and Herzegovina') selected
                                                @endif value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Barbados') selected
                                                @endif value="Barbados">Barbados
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Wallis and Futuna') selected
                                                @endif value="Wallis and Futuna">Wallis and Futuna
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Saint Barthelemy') selected
                                                @endif value="Saint Barthelemy">Saint Barthelemy
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Bermuda') selected
                                                @endif value="Bermuda">Bermuda
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Brunei') selected
                                                @endif value="Brunei">Brunei
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Bolivia') selected
                                                @endif value="Bolivia">Bolivia
                                        </option>
                                        <option @if($healthlisence->issuing_authority_country=='Bahrain') selected
                                                @endif value="Bahrain">Bahrain
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Issuing Authority City</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="issuing_authority_city" placeholder="Enter Authority city"
                                           value="{{$healthlisence->issuing_authority_city}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">License Conferred Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="license_conferred_date"
                                           value="{{$healthlisence->license_conferred_date}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">License Expiry Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="license_expiry_date"
                                           value="{{$healthlisence->license_expiry_date}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;margin-bottom: 2px;">
                                        License Type*</p>
                                    <select class="form-control form select2" id="license_type"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="license_type">
                                        <option value="" selected disabled>select Authority Country</option>
                                        <option @if($healthlisence->license_type=='Full Time') selected
                                                @endif value="Full Time">Full Time
                                        </option>
                                        <option @if($healthlisence->license_type=='Part Time') selected
                                                @endif value="Part Time">Part Time
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">License Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="license_number"
                                           value="{{$healthlisence->license_number}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;margin-bottom: 2px;">
                                        License Status*</p>
                                    <select class="form-control form select2" id="license_status"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="license_status">
                                        <option value="" selected disabled>select Authority Country</option>
                                        <option @if($healthlisence->license_status=='Active') selected
                                                @endif value="Active">Active
                                        </option>
                                        <option @if($healthlisence->license_status=='Inactive') selected
                                                @endif value="Inactive">Inactive
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">License Attained</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="license_attained"
                                           value="{{$healthlisence->license_attained}}">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">License Copy</p>
                                    <input type="file" class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="license_copy"
                                           value="{{$healthlisence->license_copy}}">
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
                        placeholder: "select a applicant"
                    });
                    $('#license_status').select2({
                        placeholder: "select a license status"
                    });
                    $('#license_type').select2({
                        placeholder: "select a license type"
                    });
                    $('#authority_country').select2({
                        placeholder: "select a country"
                    });
                });
            </script>
@endsection