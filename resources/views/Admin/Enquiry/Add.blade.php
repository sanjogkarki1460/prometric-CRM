@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Add Enquiry</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('Enquiry.index')}}">Enquiry View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Enquiry Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('Enquiry.store')}}" method="post">
                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                           type="text" name="last_name" placeholder="Enter Last name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Middle Name*</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="middle_name" placeholder="Enter Middle name">
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
                                    <p class="ah1" style="margin-top: 20px;">Phone*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="number" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Address*</p>
                                    <input required class="form form-control form-body"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">category*</p>
                                    <select required class="form-control form select2" id="category"
                                            style="height:50%;width:80%;margin-top: -20px;" name="Category_id">
                                        <option value="" selected disabled>--select any one--</option>
                                        <optgroup label="Category">
                                            @foreach($category as $category)
                                                <option value="{{$category->id}}">{{$category->Name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Subject*</p>
                                    <select required class="form-control form select2" id="subject"
                                            style="height:50%;width:80%;margin-top: -15px;" name="subject">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Nursing">Nursing</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Physiotherapy">Physiotherapy</option>
                                        <option value="Dentistry">Dentistry</option>
                                        <option value="Optometry">Optometry</option>
                                        <option value="MBBS(Doctor)">MBBS(Doctor)</option>
                                        <option value="MD/MS(Doctor)">MD/MS(Doctor)</option>
                                        <option value="Ocupational Therapy">Ocupational Therapy</option>
                                        <option value="Radiography">Radiography</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Qualification Level*</p>
                                    <select required class="form-control form select2" id="qualification_level"
                                            style="height:50%;width:80%;margin-top: -15px;" name="qualification_level">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Experience*</p>
                                    <select required class="form-control form select2" id="experience"
                                            style="height:50%;width:80%;margin-top: -15px;" name="experience">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Country Intrested*</p>
                                    <select required class="form-control form select2" id="country_interested"
                                            style="height:50%;width:80%;margin-top: -15px;" name="country_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="UAE-Dubai">UAE-Dubai</option>
                                        <option value="UAE-abu Dhabi">UAE-abu Dhabi</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Oman">Oman</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Europe">Europe</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Service Intrested*</p>
                                    <select required class="form-control form select2" id="service_interested"
                                            style="height:50%;width:80%;margin-top: -15px;" name="service_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Sasto Website">Sasto Website</option>
                                        <option value="DHA Service Charge">DHA Service Charge</option>
                                        <option value="DHA License Exam Preparation">DHA License Exam Preparation
                                        </option>
                                        <option value="HAAD License Application">HAAD License Application</option>
                                        <option value="MOH License Application">MOH License Application</option>
                                        <option value="MOH License Exam Preparation">MOH License Exam Preparation
                                        </option>
                                        <option value="QCHP License Application">QCHP License Application</option>
                                        <option value="QCHP License Exam Preparation">QCHP License Exam Preparation
                                        </option>
                                        <option value="OMSB License Application">OMSB License Application</option>
                                        <option value="OMSB License Exam Preparation">OMSB License Exam Preparation
                                        </option>
                                        <option value="SLE/SCFHS License Application">SLE/SCFHS License Application
                                        </option>
                                        <option value="SLE/SCFHS License Exam Preparation">SLE/SCFHS License Exam
                                            Preparation
                                        </option>
                                        <option value="NHRA License Application">NHRA License Application</option>
                                        <option value="NHRA License Exam Preparation">NHRA License Exam Preparation
                                        </option>
                                        <option value="NCLEX-(USA) License Application">NCLEX-(USA) License
                                            Application
                                        </option>
                                        <option value="NCLEX-(USA) License Exam Preparation">NCLEX-(USA) License Exam
                                            Preparation
                                        </option>
                                        <option value="NCLEX-(Canada) License Application">NCLEX-(Canada) License
                                            Application
                                        </option>
                                        <option value="NCLEX-(Canada) License Exam Preparation">NCLEX-(Canada) License
                                            Exam Preparation
                                        </option>
                                        <option value="NMC-(UK) License Exam Preparation">NMC-(UK) License Exam
                                            Preparation
                                        </option>
                                        <option value="NMC-(UK) License Application">NMC-(UK) License Application
                                        </option>
                                        <option value="NMBI-(Ireland) License Application">NMBI-(Ireland) License
                                            Application
                                        </option>
                                        <option value="NMBI-(Ireland) License Exam Preparation">NMBI-(Ireland) License
                                            Exam Preparation
                                        </option>
                                        <option value="Irma Cherry">Irma Cherry</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Enquiry From*</p>
                                    <select class="form-control form select2" id="enquiry_from"
                                            style="height:50%;width:80%;margin-top: -15px;" name="enquiry_from">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Prometric Exam Nepal">Prometric Exam Nepal</option>
                                        <option value="OET preparation Nepal">OET preparation Nepal</option>
                                        <option value="DHA Exam Nepal">DHA Exam Nepal</option>
                                        <option value="Medical Exam Abroad">Medical Exam Abroad</option>
                                        <option value="Nursing Abroad Nepal">Nursing Abroad Nepal</option>
                                        <option value="Nursing in Dubai">Nursing in Dubai</option>
                                        <option value="Nursing in Australia">Nursing in Australia</option>
                                        <option value="Nursing in UK">Nursing in UK</option>
                                        <option value="Nursing in USA">Nursing in USA</option>
                                        <option value="Nursing in Canada">Nursing in Canada</option>
                                        <option value="Doctors Abroad Nepal">Doctors Abroad Nepal</option>
                                        <option value="Doctors in Dubai">Doctors in Dubai</option>
                                        <option value="Doctors in Australia">Doctors in Australia</option>
                                        <option value="Doctors in UK">Doctors in UK</option>
                                        <option value="Doctors in USA">Doctors in USA</option>
                                        <option value="Doctors in Canada">Doctors in Canada</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Souce*</p>
                                    <select class="form-control form select2" id="source"
                                            style="height:50%;width:80%;margin-top: -15px;" name="source">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="facebook">facebook</option>
                                        <option value="Email">Email</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Linkedin">Linkedin</option>
                                        <option value="Website">Website</option>
                                        <option value="Twak">Twak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks*</p>
                                    <textarea class="form form-control" style="width:80%;margin-top:-15px;"
                                              rows="5"
                                              type="text" name="remarks" placeholder="Enter Remarks"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Responded Through*</p>
                                    <select class="form-control form select2 sjs-example-placeholder-multiple js-state" multiple="multiple" id="responded_through"
                                            style="height:50%;width:80%;margin-top: -10px;" name="responded_through[]">
                                        {{--<option value="" selected disabled></option>--}}
                                        <option value="None">None</option>
                                        <option value="SMS">SMS</option>
                                        <option value="Email">Email</option>
                                        <option value="Telephone">Telephone</option>
                                        <option value="Viber">Viber</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Eligibility*</p>
                                    <select required class="form-control form select2" id="eligibility"
                                            style="height:50%;width:80%;margin-top: -15px;" name="eligibility">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Eligible">Eligible</option>
                                        <option value="Noteligible">Not Eligible</option>
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
                    $('#category').select2({
                        placeholder: "select a category"
                    });
                    $('#subject').select2({
                        placeholder: "select a subject"
                    });
                    $('#qualification_level').select2({
                        placeholder: "select a Qualification Level"
                    });
                    $('#experience').select2({
                        placeholder: "select a experience"
                    });
                    $('#country_interested').select2({
                        placeholder: "select a interested country"
                    });
                    $('#service_interested').select2({
                        placeholder: "select a interested service"
                    });
                    $('#enquiry_from').select2({
                        placeholder: "select a enquiry from"
                    });
                    $('#source').select2({
                        placeholder: "select a source"
                    });
                    $('#responded_through').select2({
                        placeholder: "select a responded through"
                    });
                    $('#eligibility').select2({
                        placeholder: "select a eligibility"
                    });
                });
            </script>
@endsection

