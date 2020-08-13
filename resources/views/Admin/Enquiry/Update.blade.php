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
                                    <p class="ah1" style="margin-top: 20px;">First Name*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="first_name" placeholder="Enter First name"
                                           value="{{$enquiry->first_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Last Name*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="last_name" placeholder="Enter Last name"
                                           value="{{$enquiry->last_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Middle Name*</p>
                                    <input class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="text" name="middle_name" placeholder="Enter Middle name"
                                           value="{{$enquiry->middle_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Email*</p>
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
                                    <p class="ah1" style="margin-top: 20px;">Phone*</p>
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
                                    <p class="ah1" style="margin-top: 20px;">Address*</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">category*</p>
                                    <select required class="form-control form  select2" id="category"
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Subject*</p>
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
                                        <option @if($enquiry->subject=='Dentistry') selected @endif value="Dentistry">
                                            Dentistry
                                        </option>
                                        <option @if($enquiry->subject=='Optometry') selected @endif value="Optometry">
                                            Optometry
                                        </option>
                                        <option @if($enquiry->subject=='MBBS(Doctor)') selected
                                                @endif value="MBBS(Doctor)">MBBS(Doctor)
                                        </option>
                                        <option @if($enquiry->subject=='MD/MS(Doctor)') selected
                                                @endif value="MD/MS(Doctor)">MD/MS(Doctor)
                                        </option>
                                        <option @if($enquiry->subject=='Ocupational Therapy') selected
                                                @endif value="Ocupational Therapy">Ocupational Therapy
                                        </option>
                                        <option @if($enquiry->subject=='Radiography') selected
                                                @endif value="Radiography">Radiography
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Qualification Level*</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Experience*</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Country Intrested*</p>
                                    <select required class="form-control form select2" id="country_interested"
                                            style="height:50%;width:80%;margin-top: -20px;" name="country_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->country_interested=='UAE-Dubai') selected
                                                @endif value="UAE-Dubai">UAE-Dubai
                                        </option>
                                        <option @if($enquiry->country_interested=='UAE-abu Dhabi') selected
                                                @endif value="UAE-abu Dhabi">UAE-abu Dhabi
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Service Intrested*</p>
                                    <select required class="form-control form select2" id="service_interested"
                                            style="height:50%;width:80%;margin-top: -20px;" name="service_interested">
                                        <option value="" selected disabled>--select any one--</option>
                                        <option @if($enquiry->service_interested=='Sasto Website') selected
                                                @endif  value="Sasto Website">Sasto Website
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA Service Charge') selected
                                                @endif  value="DHA Service Charge">DHA Service Charge
                                        </option>
                                        <option @if($enquiry->service_interested=='DHA License Exam Preparation') selected
                                                @endif  value="DHA License Exam Preparation">DHA License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='HAAD License Application') selected
                                                @endif  value="HAAD License Application">HAAD License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Application') selected
                                                @endif  value="MOH License Application">MOH License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='MOH License Exam Preparation') selected
                                                @endif  value="MOH License Exam Preparation">MOH License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='QCHP License Application') selected
                                                @endif  value="QCHP License Application">QCHP License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='QCHP License Exam Preparation') selected
                                                @endif  value="QCHP License Exam Preparation">QCHP License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='OMSB License Application') selected
                                                @endif  value="OMSB License Application">OMSB License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='OMSB License Exam Preparation') selected
                                                @endif  value="OMSB License Exam Preparation">OMSB License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='SLE/SCFHS License Application') selected
                                                @endif  value="SLE/SCFHS License Application">SLE/SCFHS License
                                            Application
                                        </option>
                                        <option @if($enquiry->service_interested=='SLE/SCFHS License Exam Preparation') selected
                                                @endif  value="SLE/SCFHS License Exam Preparation">SLE/SCFHS License
                                            Exam Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='NHRA License Application') selected
                                                @endif  value="NHRA License Application">NHRA License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='NHRA License Exam Preparation') selected
                                                @endif  value="NHRA License Exam Preparation">NHRA License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='NCLEX-(USA) License Application') selected
                                                @endif  value="NCLEX-(USA) License Application">NCLEX-(USA) License
                                            Application
                                        </option>
                                        <option @if($enquiry->service_interested=='NCLEX-(USA) License Exam Preparation') selected
                                                @endif  value="NCLEX-(USA) License Exam Preparation">NCLEX-(USA) License
                                            Exam Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='NCLEX-(Canada) License Application') selected
                                                @endif  value="NCLEX-(Canada) License Application">NCLEX-(Canada)
                                            License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='NCLEX-(Canada) License Exam Preparation') selected
                                                @endif  value="NCLEX-(Canada) License Exam Preparation">NCLEX-(Canada)
                                            License Exam Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='NMC-(UK) License Exam Preparation') selected
                                                @endif  value="NMC-(UK) License Exam Preparation">NMC-(UK) License Exam
                                            Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='NMC-(UK) License Application') selected
                                                @endif  value="NMC-(UK) License Application">NMC-(UK) License
                                            Application
                                        </option>
                                        <option @if($enquiry->service_interested=='NMBI-(Ireland) License Application') selected
                                                @endif  value="NMBI-(Ireland) License Application">NMBI-(Ireland)
                                            License Application
                                        </option>
                                        <option @if($enquiry->service_interested=='NMBI-(Ireland) License Exam Preparation') selected
                                                @endif  value="NMBI-(Ireland) License Exam Preparation">NMBI-(Ireland)
                                            License Exam Preparation
                                        </option>
                                        <option @if($enquiry->service_interested=='Irma Cherry') selected
                                                @endif  value="Irma Cherry">Irma Cherry
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Enquiry From*</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Souce*</p>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Enquired date*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="Enquired_date" value="{{$enquiry->Enquired_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Office Visited*</p>
                                    <input @if($enquiry->Office_visited=='Yes') checked @endif type="checkbox" name="Office_visited" value="Yes">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Visited date*</p>
                                    <input  class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="date" name="Visited_date" value="{{$enquiry->Visited_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks*</p>
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
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Responded Through*</p>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom:5px;">Eligibility*</p>
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
                    $('#category').select2({
                        placeholder: "Select a category"
                    });
                    $('#subject').select2({
                        placeholder: "Select a subject"
                    });
                    $('#qualification_level').select2({
                        placeholder: "Select a Qualification Level"
                    });
                    $('#experience').select2({
                        placeholder: "Select a experience"
                    });
                    $('#country_interested').select2({
                        placeholder: "Select a interested country"
                    });
                    $('#service_interested').select2({
                        placeholder: "Select a interested service"
                    });
                    $('#enquiry_from').select2({
                        placeholder: "Select a enquiry from"
                    });
                    $('#source').select2({
                        placeholder: "Select a source"
                    });
                    $('#responded_through').select2({
                        placeholder: "Select a responded through"
                    });
                    $('#eligibility').select2({
                        placeholder: "Select a eligibility"
                    });
                });
            </script>
@endsection