@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Update Enquiry</div>
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
                                <li class="active">Enquiry Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('Enquiry.update',$enquiry->id)}}" method="post">
                        {{csrf_field()}}
                        <input required type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">First Name<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="first_name" placeholder="Enter First Name"
                                           value="{{$enquiry->first_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Last Name<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="last_name" placeholder="Enter Last Name"
                                           value="{{$enquiry->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Middle Name</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="middle_name" placeholder="Enter Middle Name"
                                           value="{{$enquiry->middle_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Email<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="email" name="email" placeholder="Enter Email"
                                           value="{{$enquiry->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Phone<span class="text-danger">*</span></p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="number" name="phone" placeholder="Enter Phone"
                                           value="{{$enquiry->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Address</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="address" placeholder="Enter Address"
                                           value="{{$enquiry->address}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Profession<span class="text-danger">*</span></p>
                                    <select required class="form-control form  select2" id="profession"
                                            style="height:50%;width:80%;margin-top: -20px;" name="Category_id">
                                        <option value="" selected disabled>--Select any one--</option>
                                        @if($enquiry->Category_id)
                                            @foreach($category as $category)
                                                <option @if($category->Name==$cat) selected
                                                        @endif  value="{{$category->id}}">{{$category->Name}}</option>
                                            @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Subject</p>
                                    <select required class="form-control form select2" id="subject"
                                            style="height:50%;width:80%;margin-top: -20px;" name="subject">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->subject=='Nursing') selected @endif value="Nursing">
                                            Nursing
                                        </option>
                                        <option @if($enquiry->subject=='Pharmacy') selected @endif value="Pharmacy">
                                            Pharmacy
                                        </option>
                                        <option @if($enquiry->subject=='Physiotherapy') selected
                                                @endif value="Physiotherapy">Physiotherapy
                                        </option>
                                        <option @if($enquiry->subject=='Dentistry(BDS)') selected @endif value="Dentistry(BDS)">
                                            Dentistry(BDS)
                                        </option>
                                        <option @if($enquiry->subject=='Radiography') selected
                                                @endif value="Radiography">Radiography
                                        </option>
                                        <option @if($enquiry->subject=='Midwifery') selected
                                                @endif value="Midwifery">Midwifery
                                        </option>
                                        <option @if($enquiry->subject=='Medicine(MBBS)') selected
                                                @endif value="Medicine(MBBS)">Medicine(MBBS)
                                        </option>
                                        <option @if($enquiry->subject=='Medical Laboratory') selected
                                                @endif value="Medical Laboratory">Medical Laboratory
                                        </option>
                                        <option @if($enquiry->subject=='Anesthesia') selected
                                                @endif value="Anesthesia">Anesthesia
                                        </option>
                                        <option @if($enquiry->subject=='Dental Hygiene') selected
                                                @endif value="Dental Hygiene">Dental Hygiene
                                        </option>
                                        <option @if($enquiry->subject=='Cardiology') selected
                                                @endif value="Cardiology">Cardiology
                                        </option>
                                        <option @if($enquiry->subject=='Clinical Pathology') selected
                                                @endif value="Clinical Pathology">Clinical Pathology
                                        </option>
                                        <option @if($enquiry->subject=='Dermatology') selected
                                                @endif value="Dermatology">Dermatology
                                        </option>
                                        <option @if($enquiry->subject=='Emergency Medicine') selected
                                                @endif value="Emergency Medicine">Emergency Medicine
                                        </option>
                                        <option @if($enquiry->subject=='Endocrinology') selected
                                                @endif value="Endocrinology">Endocrinology
                                        </option>
                                        <option @if($enquiry->subject=='Family Medicine') selected
                                                @endif value="Family Medicine">Family Medicine
                                        </option>
                                        <option @if($enquiry->subject=='Gastroenterology') selected
                                                @endif value="Gastroenterology">Gastroenterology
                                        </option>
                                        <option @if($enquiry->subject=='Gastrointestinal Surgery') selected
                                                @endif value="Gastrointestinal Surgery">Gastrointestinal Surgery
                                        </option>
                                        <option @if($enquiry->subject=='General Surgery') selected
                                                @endif value="General Surgery">General Surgery
                                        </option>
                                        <option @if($enquiry->subject=='Internal Medicine') selected
                                                @endif value="Internal Medicine">Internal Medicine
                                        </option>
                                        <option @if($enquiry->subject=='Neonatology') selected
                                                @endif value="Neonatology">Neonatology
                                        </option>
                                        <option @if($enquiry->subject=='Nephrology') selected
                                                @endif value="Nephrology">Nephrology
                                        </option>
                                        <option @if($enquiry->subject=='Neurology') selected
                                                @endif value="Neurology">Neurology
                                        </option>
                                        <option @if($enquiry->subject=='Neurosurgery') selected
                                                @endif value="Neurosurgery">Neurosurgery
                                        </option>
                                        <option @if($enquiry->subject=='Nuclear Medicine') selected
                                                @endif value="Nuclear Medicine">Nuclear Medicine
                                        </option>
                                        <option @if($enquiry->subject=='Obstetric and Gynecology') selected
                                                @endif value="Obstetric and Gynecology">Obstetric and Gynecology
                                        </option>
                                        <option @if($enquiry->subject=='Oncology') selected
                                                @endif value="Oncology">Oncology
                                        </option>
                                        <option @if($enquiry->subject=='Opthalmology') selected
                                                @endif value="Opthalmology">Opthalmology
                                        </option>
                                        <option @if($enquiry->subject=='Orthopedice surgery') selected
                                                @endif value="Orthopedice surgery">Orthopedice surgery
                                        </option>
                                        <option @if($enquiry->subject=='Otolaryngology') selected
                                                @endif value="Otolaryngology">Otolaryngology
                                        </option>
                                        <option @if($enquiry->subject=='pediatric') selected
                                                @endif value="pediatric">pediatric
                                        </option>
                                        <option @if($enquiry->subject=='Plastic Surgery') selected
                                                @endif value="Plastic Surgery">Plastic Surgery
                                        </option>
                                        <option @if($enquiry->subject=='Psychiatry') selected
                                                @endif value="Psychiatry">Psychiatry
                                        </option>
                                        <option @if($enquiry->subject=='Radiology') selected
                                                @endif value="Radiology">Radiology
                                        </option>
                                        <option @if($enquiry->subject=='Urology') selected
                                                @endif value="Urology">Urology
                                        </option>
                                        <option @if($enquiry->subject=='TCAM Homeopathy') selected
                                                @endif value="TCAM Homeopathy">TCAM Homeopathy
                                        </option>
                                        <option @if($enquiry->subject=='Psychologist') selected
                                                @endif value="Psychologist">Psychologist
                                        </option>
                                        <option @if($enquiry->subject=='Endodontics') selected
                                                @endif value="Endodontics">Endodontics
                                        </option>
                                        <option @if($enquiry->subject=='Oral and Maxillofacial surgery') selected
                                                @endif value="Oral and Maxillofacial surgery">Oral and Maxillofacial surgery
                                        </option>
                                        <option @if($enquiry->subject=='Oral Surgery') selected
                                                @endif value="Oral Surgery">Oral Surgery
                                        </option>
                                        <option @if($enquiry->subject=='Orthodontics') selected
                                                @endif value="Orthodontics">Orthodontics
                                        </option>
                                        <option @if($enquiry->subject=='Periodontics') selected
                                                @endif value="Periodontics">Periodontics
                                        </option>
                                        <option @if($enquiry->subject=='Prosthodontics') selected
                                                @endif value="Prosthodontics">Prosthodontics
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Qualification Level</p>
                                    <select required class="form-control form select2" id="qualification_level"
                                            style="height:50%;width:80%;margin-top: -20px;" name="qualification_level">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->qualification_level=='Diploma') selected
                                                @endif value="Diploma">Diploma
                                        </option>
                                        <option @if($enquiry->qualification_level=='Bachelor') selected
                                                @endif value="Bachelor">Bachelor
                                        </option>
                                        <option @if($enquiry->qualification_level=='Master') selected
                                                @endif value="Master">Master
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Experience</p>
                                    <select required class="form-control form select2" id="experience"
                                            style="height:50%;width:80%;margin-top: -20px;" name="experience">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->experience=='1') selected @endif value="1">1</option>
                                        <option @if($enquiry->experience=='2') selected @endif value="2">2</option>
                                        <option @if($enquiry->experience=='3') selected @endif value="3">3</option>
                                        <option @if($enquiry->experience=='4') selected @endif value="4">4</option>
                                        <option @if($enquiry->experience=='5') selected @endif value="5">5</option>
                                        <option @if($enquiry->experience=='6') selected @endif value="6">6</option>
                                        <option @if($enquiry->experience=='7') selected @endif value="7">7</option>
                                        <option @if($enquiry->experience=='8') selected @endif value="8">8</option>
                                        <option @if($enquiry->experience=='9') selected @endif value="9">9</option>
                                        <option @if($enquiry->experience=='10') selected @endif value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Country Intrested</p>
                                    <select required class="form-control form select2" id="country_interested"
                                            style="height:50%;width:80%;margin-top: -20px;" name="country_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->country_interested=='UAE-Dubai') selected
                                                @endif value="UAE-Dubai">UAE-Dubai
                                        </option>
                                        <option @if($enquiry->country_interested=='UAE-abu Dhabi') selected
                                                @endif value="UAE-abu Dhabi">UAE-abu Dhabi
                                        </option>
                                        <option @if($enquiry->country_interested=='UAE Others State') selected
                                                @endif value="UAE Others State">UAE Others State
                                        </option>
                                        <option @if($enquiry->country_interested=='Saudi Arabia') selected
                                                @endif value="Saudi Arabia">Saudi Arabia
                                        </option>
                                        <option @if($enquiry->country_interested=='Qatar') selected
                                                @endif value="Qatar">Qatar
                                        </option>
                                        <option @if($enquiry->country_interested=='Oman') selected @endif value="Oman">
                                            Oman
                                        </option>
                                        <option @if($enquiry->country_interested=='USA') selected @endif value="USA">
                                            USA
                                        </option>
                                        <option @if($enquiry->country_interested=='UK') selected @endif value="UK">UK
                                        </option>
                                        <option @if($enquiry->country_interested=='Canada') selected
                                                @endif value="Canada">Canada
                                        </option>
                                        <option @if($enquiry->country_interested=='Australia') selected
                                                @endif value="Australia">Australia
                                        </option>
                                        <option @if($enquiry->country_interested=='Ireland') selected
                                                @endif value="Ireland">Ireland
                                        </option>
                                        <option @if($enquiry->country_interested=='New Zealand') selected
                                                @endif value="New Zealand">New Zealand
                                        </option>
                                        <option @if($enquiry->country_interested=='Europe') selected
                                                @endif value="Europe">Europe
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Service Intrested</p>
                                    <select required class="form-control form select2" id="service_interested"
                                            style="height:50%;width:80%;margin-top: -20px;" name="service_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Nurse(Diploma)') selected
                                                @endif  value="DHA License Package for Nurse(Diploma)">DHA License Package for Nurse(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Nurse(Bachelor)') selected
                                                @endif  value="DHA License Package for Nurse(Bachelor)">DHA License Package for Nurse(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Doctor(MBBS)') selected
                                                @endif  value="DHA License Package for Doctor(MBBS)">DHA License Package for Doctor(MBBS)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Doctor(MD/MS)') selected
                                                @endif  value="DHA License Package for Doctor(MD/MS)">DHA License Package for Doctor(MD/MS)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Doctor(BDS)') selected
                                                @endif  value="DHA License Package for Doctor(BDS)">DHA License Package for Doctor(BDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Doctor(MDS)') selected
                                                @endif  value="DHA License Package for Doctor(MDS)">DHA License Package for Doctor(MDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Others Health Profession(Bachelor)') selected
                                                @endif  value="DHA License Package for Others Health Profession(Bachelor)">DHA License Package for Others Health Profession(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Package for Others Health Profession(Diploma)') selected
                                                @endif  value="DHA License Package for Others Health Profession(Diploma)">DHA License Package for Others Health Profession(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Nurse(Diploma)') selected
                                                @endif  value="HAAD License Package for Nurse(Diploma)">HAAD License Package for Nurse(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Nurse(Bachelor)') selected
                                                @endif  value="HAAD License Package for Nurse(Bachelor)">HAAD License Package for Nurse(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Doctor(MBBS)') selected
                                                @endif  value="HAAD License Package for Doctor(MBBS)">HAAD License Package for Doctor(MBBS)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Doctor(MD/MS)') selected
                                                @endif  value="HAAD License Package for Doctor(MD/MS)">HAAD License Package for Doctor(MD/MS)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Doctor(BDS)') selected
                                                @endif  value="HAAD License Package for Doctor(BDS)">HAAD License Package for Doctor(BDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Doctor(MDS)') selected
                                                @endif  value="HAAD License Package for Doctor(MDS)">HAAD License Package for Doctor(MDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Others Health Profession(Bachelor)') selected
                                                @endif  value="HAAD License Package for Others Health Profession(Bachelor)">HAAD License Package for Others Health Profession(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Package for Others Health Profession(Diploma)') selected
                                                @endif  value="HAAD License Package for Others Health Profession(Diploma)">HAAD License Package for Others Health Profession(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Nurse(Diploma)') selected
                                                @endif  value="MOH License Package for Nurse(Diploma)">MOH License Package for Nurse(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Nurse(Bachelor)') selected
                                                @endif  value="MOH License Package for Nurse(Bachelor)">MOH License Package for Nurse(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Doctor(MBBS)') selected
                                                @endif  value="MOH License Package for Doctor(MBBS)">MOH License Package for Doctor(MBBS)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Doctor(MD/MS)') selected
                                                @endif  value="MOH License Package for Doctor(MD/MS)">MOH License Package for Doctor(MD/MS)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Doctor(BDS)') selected
                                                @endif  value="MOH License Package for Doctor(BDS)">MOH License Package for Doctor(BDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Doctor(MDS)') selected
                                                @endif  value="MOH License Package for Doctor(MDS)">MOH License Package for Doctor(MDS)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Others Health Profession(Bachelor)') selected
                                                @endif  value="MOH License Package for Others Health Profession(Bachelor)">MOH License Package for Others Health Profession(Bachelor)
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Package for Others Health Profession(Diploma)') selected
                                                @endif  value="MOH License Package for Others Health Profession(Diploma)">MOH License Package for Others Health Profession(Diploma)
                                        </option>
                                        <option @if($enquiry->service_interested=='Visa Application Assistance') selected
                                                @endif  value="Visa Application Assistance">Visa Application Assistance
                                        </option>
                                        <option @if($enquiry->service_interested=='Permanent Residence(PR) Application') selected
                                                @endif  value="Permanent Residence(PR) Application">Permanent Residence(PR) Application
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Enquiry From</p>
                                    <select class="form-control form select2" id="enquiry_from"
                                            style="height:50%;width:80%;margin-top: -20px;" name="enquiry_from">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->enquiry_from=='Prometric Exam Nepal') selected
                                                @endif value="Prometric Exam Nepal">Prometric Exam Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='OET preparation Nepal') selected
                                                @endif value="OET preparation Nepal">OET preparation Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='DHA Exam Nepal') selected
                                                @endif value="DHA Exam Nepal">DHA Exam Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='HAAD Exam Nepal') selected
                                                @endif value="HAAD Exam Nepal">HAAD Exam Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='PLAB Preparation Nepal') selected
                                                @endif value="PLAB Preparation Nepal">PLAB Preparation Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Medical Exam Abroad') selected
                                                @endif value="Medical Exam Abroad">Medical Exam Abroad
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing Abroad Nepal') selected
                                                @endif value="Nursing Abroad Nepal">Nursing Abroad Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing in Dubai') selected
                                                @endif value="Nursing in Dubai">Nursing in Dubai
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing in Australia') selected
                                                @endif value="Nursing in Australia">Nursing in Australia
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing in UK') selected
                                                @endif value="Nursing in UK">Nursing in UK
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing in USA') selected
                                                @endif value="Nursing in USA">Nursing in USA
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Nursing in Canada') selected
                                                @endif value="Nursing in Canada">Nursing in Canada
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors Abroad Nepal') selected
                                                @endif value="Doctors Abroad Nepal">Doctors Abroad Nepal
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors in Dubai') selected
                                                @endif value="Doctors in Dubai">Doctors in Dubai
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors in Australia') selected
                                                @endif value="Doctors in Australia">Doctors in Australia
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors in UK') selected
                                                @endif value="Doctors in UK">Doctors in UK
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors in USA') selected
                                                @endif value="Doctors in USA">Doctors in USA
                                        </option>
                                        <option @if($enquiry->enquiry_from=='Doctors in Canada') selected
                                                @endif value="Doctors in Canada">Doctors in Canada
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Source</p>
                                    <select class="form-control form select2" id="source"
                                            style="height:50%;width:80%;margin-top: -20px;" name="source">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->source=='facebook') selected @endif value="facebook">
                                            facebook
                                        </option>
                                        <option @if($enquiry->source=='Email') selected @endif value="Email">Email
                                        </option>
                                        <option @if($enquiry->source=='Instagram') selected @endif value="Instagram">
                                            Instagram
                                        </option>
                                        <option @if($enquiry->source=='Linkedin') selected @endif value="Linkedin">
                                            Linkedin
                                        </option>
                                        <option @if($enquiry->source=='Website') selected @endif value="Website">
                                            Website
                                        </option>
                                        <option @if($enquiry->source=='Twak') selected @endif value="Twak">Twak</option>
                                        <option @if($enquiry->source=='Twitter') selected @endif value="Twitter">Twitter</option>
                                        <option @if($enquiry->source=='Refer by old student') selected @endif value="Refer by old student">Refer by old student</option>
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
                                           type="date" name="Enquired_date" value="{{$enquiry->Enquired_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Office Visited</p>
                                    <input @if($enquiry->Office_visited=='Yes') checked @endif type="checkbox" name="Office_visited" value="Yes">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Visited Date</p>
                                    <input  class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="Visited_date" value="{{$enquiry->Visited_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks</p>
                                    <textarea class="form form-control" style="width:80%;margin-top:-15px;"
                                              rows="5"
                                              type="text" name="remarks"
                                              placeholder="Enter Remarks">{{$enquiry->remarks}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Responded Through</p>
                                    <select required class="form-control form select2 sjs-example-placeholder-multiple js-state" multiple="multiple" id="responded_through"
                                            style="height:50%;width:80%;margin-top: -20px;" name="responded_through[]">
                                        {{--<option value="" selected disabled>--select any one--</option>--}}
                                        <option @if($enquiry->responded_through=='None') selected @endif value="None">
                                            None
                                        </option>
                                        <option @if($enquiry->responded_through=='SMS') selected @endif value="SMS">
                                            SMS
                                        </option>
                                        <option @if($enquiry->responded_through=='Email') selected @endif value="Email">
                                            Email
                                        </option>
                                        <option @if($enquiry->responded_through=='Telephone') selected
                                                @endif value="Telephone">Telephone
                                        </option>
                                        <option @if($enquiry->responded_through=='Viber') selected @endif value="Viber">
                                            Viber
                                        </option>
                                        <option @if($enquiry->responded_through=='Facebook') selected
                                                @endif value="Facebook">Facebook
                                        </option>
                                        <option @if($enquiry->responded_through=='WhatsApp') selected
                                                @endif value="WhatsApp">WhatsApp
                                        </option>
                                        <option @if($enquiry->responded_through=='Twak') selected
                                                @endif value="Twak">Twak
                                        </option>
                                        <option @if($enquiry->responded_through=='Twitter') selected
                                                @endif value="Twitter">Twitter
                                        </option>
                                        <option @if($enquiry->responded_through=='Linkdin') selected
                                                @endif value="Linkdin">Linkdin
                                        </option>
                                        <option @if($enquiry->responded_through=='Instagram') selected
                                                @endif value="Instagram">Instagram
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Color Code<span class="text-danger">*</span></p>
                                    <input @if($enquiry->color_code=='whitelist') checked @endif type="radio" name="color_code" value="whitelist">White List
                                    <input @if($enquiry->color_code=='redlist') checked @endif type="radio" name="color_code" value="redlist">Red List
                                    <input @if($enquiry->color_code=='blacklist') checked @endif type="radio" name="color_code" value="blacklist">Black List
                                    <input @if($enquiry->color_code=='greenlist') checked @endif type="radio" name="color_code" value="greenlist">Green List
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Eligibility</p>
                                    <select  class="form-control form select2" id="eligibility"
                                            style="height:50%;width:80%;margin-top: -20px;" name="eligibility">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->eligibility=='Eligible') selected @endif value="Eligible">
                                            Eligible
                                        </option>
                                        <option @if($enquiry->eligibility=='Noteligible') selected
                                                @endif value="Noteligible">Not Eligible
                                        </option>
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