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
                                    <p class="ah1" style="margin-top: 20px;">First Name<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="first_name" placeholder="Enter First Name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Last Name<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="last_name" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Middle Name</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="middle_name" placeholder="Enter Middle Name">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Email<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Phone<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="number" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Address</p>
                                    <input required class="form form-control form-body"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Profession<span class="text-danger">*</span></p>
                                    <select required class="form-control form select2" id="profession"
                                            style="height:50%;width:80%;margin-top: -20px;" name="Category_id">
                                        <option value="" selected disabled>--select any one--</option>
                                        <optgroup label="Profession">
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Subject</p>
                                    <select required class="form-control form select2" id="subject"
                                            style="height:50%;width:80%;margin-top: -15px;" name="subject">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Nursing">Nursing</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Physiotherapy">Physiotherapy</option>
                                        <option value="Dentistry(BDS)">Dentistry(BDS)</option>
                                        <option value="Radiography">Radiography</option>
                                        <option value="Midwifery">Midwifery</option>
                                        <option value="Medicine(MBBS)">Medicine(MBBS)</option>
                                        <option value="Medical Laboratory">Medical Laboratory</option>
                                        <option value="Anesthesia">Anesthesia</option>
                                        <option value="Dental Hygiene">Dental Hygiene</option>
                                        <option value="Cardiology">Cardiology</option>
                                        <option value="Clinical Pathology">Clinical Pathology</option>
                                        <option value="Dermatology">Dermatology</option>
                                        <option value="Emergency Medicine">Emergency Medicine</option>
                                        <option value="Endocrinology">Endocrinology</option>
                                        <option value="Family Medicine">Family Medicine</option>
                                        <option value="Gastroenterology">Gastroenterology</option>
                                        <option value="Gastrointestinal Surgery">Gastrointestinal Surgery</option>
                                        <option value="General Surgery">General Surgery</option>
                                        <option value="Internal Medicine">Internal Medicine</option>
                                        <option value="Neonatology">Neonatology</option>
                                        <option value="Nephrology">Nephrology</option>
                                        <option value="Neurology">Neurology</option>
                                        <option value="Neurosurgery">Neurosurgery</option>
                                        <option value="Nuclear Medicine">Nuclear Medicine</option>
                                        <option value="Obstetric and Gynecology">Obstetric and Gynecology</option>
                                        <option value="Oncology">Oncology</option>
                                        <option value="Opthalmology">Opthalmology</option>
                                        <option value="Orthopedice surgery">Orthopedice surgery</option>
                                        <option value="Otolaryngology">Otolaryngology</option>
                                        <option value="pediatric">pediatric</option>
                                        <option value="Plastic Surgery">Plastic Surgery</option>
                                        <option value="Psychiatry">Psychiatry</option>
                                        <option value="Radiology">Radiology</option>
                                        <option value="Urology">Urology</option>
                                        <option value="TCAM Homeopathy">TCAM Homeopathy</option>
                                        <option value="Psychologist">Psychologist</option>
                                        <option value="Endodontics">Endodontics</option>
                                        <option value="Oral and Maxillofacial surgery">Olar and Maxillofacial surgery</option>
                                        <option value="Oral Surgery">Oral Surgery</option>
                                        <option value="Orthodontics">Orthodontics</option>
                                        <option value="Periodontics">Periodontics</option>
                                        <option value="Prosthodontics">Prosthodontics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Qualification Level</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Experience</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Country Intrested</p>
                                    <select required class="form-control form select2" id="country_interested"
                                            style="height:50%;width:80%;margin-top: -15px;" name="country_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="UAE-Dubai">UAE-Dubai</option>
                                        <option value="UAE-abu Dhabi">UAE-abu Dhabi</option>
                                        <option value="UAE Others State">UAE Others State</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Service Intrested</p>
                                    <select required class="form-control form select2" id="service_interested"
                                            style="height:50%;width:80%;margin-top: -15px;" name="service_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="DHA License Package for Nurse(Diploma)">DHA License Package for Nurse(Diploma)</option>
                                        <option value="DHA License Package for Nurse(Bachelor)">DHA License Package for Nurse(Bachelor)</option>
                                        <option value="DHA License Package for Doctor(MBBS)">DHA License Package for Doctor(MBBS)</option>
                                        <option value="DHA License Package for Doctor(MD/MS)">DHA License Package for Doctor(MD/MS)</option>
                                        <option value="DHA License Package for Doctor(BDS)">DHA License Package for Doctor(BDS)</option>
                                        <option value="DHA License Package for Doctor(MDS)">DHA License Package for Doctor(MDS)</option>
                                        <option value="DHA License Package for Others Health Profession(Bachelor)">DHA License Package for Others Health Profession(Bachelor)</option>
                                        <option value="DHA License Package for Others Health Profession(Diploma)">DHA License Package for Others Health Profession(Diploma)</option>
                                        <option value="HAAD License Package for Nurse(Diploma)">HAAD License Package for Nurse(Diploma)</option>
                                        <option value="HAAD License Package for Nurse(Bachelor)">HAAD License Package for Nurse(Bachelor)</option>
                                        <option value="HAAD License Package for Doctor(MBBS)">HAAD License Package for Doctor(MBBS)</option>
                                        <option value="HAAD License Package for Doctor(MD/MS)">HAAD License Package for Doctor(MD/MS)</option>
                                        <option value="HAAD License Package for Doctor(BDS)">HAAD License Package for Doctor(BDS)</option>
                                        <option value="HAAD License Package for Doctor(MDS)">HAAD License Package for Doctor(MDS)</option>
                                        <option value="HAAD License Package for Others Health Profession(Bachelor)">HAAD License Package for Others Health Profession(Bachelor)</option>
                                        <option value="HAAD License Package for Others Health Profession(Diploma)">HAAD License Package for Others Health Profession(Diploma)</option>
                                        <option value="MOH License Package for Nurse(Diploma)">MOH License Package for Nurse(Diploma)</option>
                                        <option value="MOH License Package for Nurse(Bachelor)">MOH License Package for Nurse(Bachelor)</option>
                                        <option value="MOH License Package for Doctor(MBBS)">MOH License Package for Doctor(MBBS)</option>
                                        <option value="MOH License Package for Doctor(MD/MS)">MOH License Package for Doctor(MD/MS)</option>
                                        <option value="MOH License Package for Doctor(BDS)">MOH License Package for Doctor(BDS)</option>
                                        <option value="MOH License Package for Doctor(MDS)">MOH License Package for Doctor(MDS)</option>
                                        <option value="MOH License Package for Others Health Profession(Bachelor)">MOH License Package for Others Health Profession(Bachelor)</option>
                                        <option value="MOH License Package for Others Health Profession(Diploma)">MOH License Package for Others Health Profession(Diploma)</option>
                                        <option value="Visa Application Assistance">Visa Application Assistance</option>
                                        <option value="Permanent Residence(PR) Application">Permanent Residence(PR) Application</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Enquiry From</p>
                                    <select class="form-control form select2" id="enquiry_from"
                                            style="height:50%;width:80%;margin-top: -15px;" name="enquiry_from">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Prometric Exam Nepal">Prometric Exam Nepal</option>
                                        <option value="OET preparation Nepal">OET preparation Nepal</option>
                                        <option value="DHA Exam Nepal">DHA Exam Nepal</option>
                                        <option value="HAAD Exam Nepal">HAAD Exam Nepal</option>
                                        <option value="PLAB Preparation Nepal">PLAB Preparation Nepal</option>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Source</p>
                                    <select class="form-control form select2" id="source"
                                            style="height:50%;width:80%;margin-top: -15px;" name="source">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="facebook">facebook</option>
                                        <option value="Email">Email</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Linkedin">Linkedin</option>
                                        <option value="Website">Website</option>
                                        <option value="Twak">Twak</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Refer by old student">Refer by old student</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Enquired Date</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="Enquired_date">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Office Visited</p>
                                    <input type="checkbox" name="Office_visited" value="Yes">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Visited Date</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="Visited_date">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Responded Through</p>
                                    <select class="form-control form select2 sjs-example-placeholder-multiple js-state"
                                            multiple="multiple" id="responded_through"
                                            style="height:50%;width:80%;margin-top: -10px;" name="responded_through[]">
                                        {{--<option value="" selected disabled></option>--}}
                                        <option value="None">None</option>
                                        <option value="SMS">SMS</option>
                                        <option value="Email">Email</option>
                                        <option value="Telephone">Telephone</option>
                                        <option value="Viber">Viber</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="Twak">Twak</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Linkdin">Linkdin</option>
                                        <option value="Instagram">Instagram</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Color Code<span class="text-danger">*</span></p>
                                    <input type="radio" name="color_code" value="whitelist">White List
                                    <input type="radio" name="color_code" value="redlist">Red List
                                    <input type="radio" name="color_code" value="blacklist">Black List
                                    <input type="radio" name="color_code" value="greenlist">Green List
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Eligibility</p>
                                    <select class="form-control form select2" id="eligibility"
                                            style="height:50%;width:80%;margin-top: -15px;" name="eligibility">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option value="Eligible">Eligible</option>
                                        <option value="Noteligible">Not Eligible</option>
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
                    $('#profession').select2({
                        placeholder: "Select a Profession"
                    });
                    $('#subject').select2({
                        placeholder: "Select a Subject"
                    });
                    $('#qualification_level').select2({
                        placeholder: "Select a Qualification Level"
                    });
                    $('#experience').select2({
                        placeholder: "Select a Experience"
                    });
                    $('#country_interested').select2({
                        placeholder: "Select a Interested Country"
                    });
                    $('#service_interested').select2({
                        placeholder: "Select a Interested Service"
                    });
                    $('#enquiry_from').select2({
                        placeholder: "Select a Enquiry From"
                    });
                    $('#source').select2({
                        placeholder: "Select a Source"
                    });
                    $('#responded_through').select2({
                        placeholder: "Select a Responded Through"
                    });
                    $('#eligibility').select2({
                        placeholder: "Select a Eligibility"
                    });
                });
            </script>
@endsection

