@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant Detail</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="{{route('Applicant.index')}}">Applicant
                                    View</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Detail</li>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <h3 class="text-center text-danger">Applicant Detail</h3>
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <h5 class="text-primary">ID</h5>
                                <p>{{$applicant->id}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">First Name</h5>
                                <p>{{$applicant->first_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Middle Name</h5>
                                <p>{{$applicant->middel_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Last Name</h5>
                                <p>{{$applicant->surname}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Is Enquired</h5>
                                <p>{{$applicant->enquired}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Enquired Name</h5>
                                <p>{{@$applicant->Enquiry_Applicant->first_name}} {{@$applicant->Enquiry_Applicant->middle_name}} {{@$applicant->Enquiry_Applicant->Last_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Gender</h5>
                                <p>{{$applicant->gender}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Date OF Birth</h5>
                                <p>{{$applicant->dob}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Maiden Name</h5>
                                <p>{{$applicant->maiden_name}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">IdenTity Type</h5>
                                <p>{{$applicant->identity_type}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Identity Card Number</h5>
                                <p>{{$applicant->identity_card_no}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Passport Card Number</h5>
                                <p>{{$applicant->passport_no}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Mobile Number</h5>
                                <p>{{$applicant->mobile_no}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Nationality</h5>
                                <p>{{$applicant->nationality}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Email</h5>
                                <p>{{$applicant->email}}</p>
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Passport Document</h5>
                                @if($applicant->passport_docs)
                                    <p><a target="_blank"
                                          href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Passport
                                            Document</a>
                                @else
                                    <p>No Document File</p>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <h5 class="text-primary">Applicant Category</h5>
                                <p>{{@$applicant->Category_Applicant->Name}}</p>
                            </div>
                        </div>
                        <hr>
                        @foreach($checklist as $checklist)
                            <div>
                                <div>
                                    <h3 class="text-center text-danger">Applicant Document Checklist</h3>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <label style="font-size: 20px;" class="control-label text-primary">password
                                        citizenship
                                        certificate</label>
                                    @if($checklist->password_citizenship_certificate=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">slc
                                        certificate</label>
                                    @if($checklist->slc_certificate=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">plus two isc pcl
                                        certificate</label>
                                    @if($checklist->plus_two_isc_pcl_certificate=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>

                                    <label style="font-size: 20px;" class="control-label text-primary">diploma degree
                                        certificate</label>
                                    @if($checklist->diploma_degree_certificate=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">mark sheet of
                                        each year final transcript</label>
                                    @if($checklist->mark_sheet_of_each_year_final_transcript=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">equivalent
                                        certificate</label>
                                    @if($checklist->equivalent_certificate=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">council
                                        registration
                                        certificate</label>
                                    @if($checklist->council_registration_certificate_renew=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">council
                                        registration
                                        certificate
                                        renew</label>
                                    @if($checklist->council_registration_certificate_renew=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">good standing
                                        letter
                                        from council</label>
                                    @if($checklist->good_standing_letter_from_council=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">work experience
                                        letter till date</label>
                                    @if($checklist->work_experience_letter_till_date=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">basic life
                                        support
                                        for nurses</label>
                                    @if($checklist->basic_life_support_for_nurses=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                    <br>
                                    <label style="font-size: 20px;" class="control-label text-primary">mrp size photo in
                                        white
                                        background</label>
                                    @if($checklist->mrp_size_photo_in_white_background=='Yes')
                                        <input type="checkbox" checked="" disabled="">
                                    @else()
                                        <input type="checkbox" disabled="">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @foreach($education as $education)
                            <hr>
                            <div>
                                <h3 class="text-center text-danger">Applicant Education Detail</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Name</h5>
                                        <p>{{$education->authority_name}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Address</h5>
                                        <p>{{$education->authority_address}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's City</h5>
                                        <p>{{$education->authority_city}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's State</h5>
                                        <p>{{$education->authority_state}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Country</h5>
                                        <p>{{$education->authority_country}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Country Code</h5>
                                        <p>{{$education->authority_country_code}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Phone</h5>
                                        <p>{{$education->authority_phone}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Email</h5>
                                        <p>{{$education->authority_email}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Authority's Website</h5>
                                        <p>{{$education->authority_website}}.com.np</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Qualification</h5>
                                        <p>{{$education->qualification}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Institution</h5>
                                        <p>{{$education->institution}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Mode</h5>
                                        <p>{{$education->mode}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Major Subject</h5>
                                        <p>{{$education->major_subject}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Minor Subject</h5>
                                        <p>{{$education->minor_subject}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Roll</h5>
                                        <p>{{$education->roll}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Study From</h5>
                                        <p>{{$education->study_from}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Study To</h5>
                                        <p>{{$education->study_to}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Confered Date</h5>
                                        <p>{{$education->conferred_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Degree Issue Date</h5>
                                        <p>{{$education->degree_issue_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Expected Degree Issue Date</h5>
                                        <p>{{$education->expected_degree_issue_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Qualification Certificate</h5>
                                        @if($education->qualification_certificate)
                                            <p><a target="_blank"
                                                  style="color: black"
                                                  href="{{asset('/upload/Applicant/Education/'.$education->qualification_certificate)}}">Click
                                                    here for Qualification
                                                    Certificate</a></p>
                                        @else
                                            <p>No Qualification Certificate Found</p>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Marksheet</h5>
                                        @if($education->marksheet)
                                            <p><a target="_blank"
                                                  style="color: black"
                                                  href="{{asset('/upload/Applicant/Education/'.$education->marksheet)}}">Click
                                                    Here for MarkSheet</a></p>
                                        @else
                                            <p>No Marksheet found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        @foreach($healthlisence as $healthlisence)
                            <div>
                                <h3 class="text-center text-danger">Applicant Health Lisence Detail</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Designation</h5>
                                        <p>{{$healthlisence->professional_designation}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Name</h5>
                                        <p>{{$healthlisence->issuing_authority_name}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Country</h5>
                                        <p>{{$healthlisence->issuing_authority_country}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority City</h5>
                                        <p>{{$healthlisence->issuing_authority_city}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Conferred date</h5>
                                        <p>{{$healthlisence->license_conferred_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Expiry Date</h5>
                                        <p>{{$healthlisence->license_expiry_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Type</h5>
                                        <p>{{$healthlisence->license_type}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Number</h5>
                                        <p>{{$healthlisence->license_number}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Status</h5>
                                        <p>{{$healthlisence->license_status}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Attained</h5>
                                        <p>{{$healthlisence->license_attained}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Lisence Copy</h5>
                                        @if($healthlisence->license_copy)
                                            <p><a target="_blank" style="color: black"
                                                  href="{{asset('/upload/Applicant/Health Lisence/'.$healthlisence->license_copy)}}">click
                                                    here Lisence Copy</a></p>
                                        @else
                                            <p>No Lisence copy Found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @foreach($employment as $employment)
                            <div>
                                <h3 class="text-center text-danger">Applicant Employment Detail</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Designation</h5>
                                        <p>{{$employment->designation}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Name</h5>
                                        <p>{{$employment->issuing_authority_name}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Address</h5>
                                        <p>{{$employment->issuing_authority_address}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Country</h5>
                                        <p>{{$employment->issuing_authority_country}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority State</h5>
                                        <p>{{$employment->issuing_authority_state}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority City</h5>
                                        <p>{{$employment->issuing_authority_city}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Country Code</h5>
                                        <p>{{$employment->issuing_authority_country_code}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Phone</h5>
                                        <p>{{$employment->issuing_authority_phone}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Email</h5>
                                        <p>{{$employment->issuing_authority_email}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Issuing Authority Website</h5>
                                        <p>{{$employment->issuing_authority_website}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Reason For Leaving</h5>
                                        <p>{{$employment->reason_for_leaving}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Nature of Employment</h5>
                                        <p>{{$employment->nature_of_employment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Employment From</h5>
                                        <p>{{$employment->employment_from}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Employment To</h5>
                                        <p>{{$employment->employment_to}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Employee Code</h5>
                                        <p>{{$employment->employee_code}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Department</h5>
                                        <p>{{$employment->department}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Experience Letter</h5>
                                        @if($employment->experience_letter)
                                            <p><a target="_blank"
                                                  style="color: black"
                                                  href="{{asset('/upload/Applicant/Employment/'.$employment->experience_letter)}}">Click
                                                    Here Experience Letter</a></p>
                                        @else
                                            <p>No Experience letter found</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        @foreach($progressflow as $progressflow)
                            <div>
                                <h3 class="text-center text-danger">Applicant Progress Flow Report</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Profession</h5>
                                        <p>{{$progressflow->profession}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Email</h5>
                                        <p>{{$progressflow->email}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Contact Number</h5>
                                        <p>{{$progressflow->contact_number}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Date of Birth</h5>
                                        <p>{{$progressflow->date_of_birth}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Passport Number</h5>
                                        <p>{{$progressflow->passport_number}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Signed By Appliant?</h5>
                                        <p>{{$progressflow->signed_by_applicant}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Signed Docs</h5>
                                        @if($progressflow->signed_docs)
                                            <a target="_blank"
                                              style="color: black" href="{{asset('/upload/Applicant/Progress flow/'.$progressflow->signed_docs)}}">Clisck here for Signed
                                                Docs</a>
                                        @else
                                            <p>No Signed document found</p>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Service Charge</h5>
                                        <p>{{$progressflow->service_charge}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Service Paid Date</h5>
                                        <p>{{$progressflow->service_paid_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Service Mode Of Payment</h5>
                                        <p>{{$progressflow->service_mode_of_payment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Service Charge Received By</h5>
                                        <p>{{$progressflow->service_charge_received_by}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Good Standing Certificate Issue Date</h5>
                                        <p>{{$progressflow->good_standing_certificate_issue_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ Fee</h5>
                                        <p>{{$progressflow->dhamcq_fee}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ Mode Of Payment</h5>
                                        <p>{{$progressflow->dhamcq_mode_of_payment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ Subject</h5>
                                        <p>{{$progressflow->dhamcq_subject}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ UserName</h5>
                                        <p>{{$progressflow->dhamcq_username}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ Password</h5>
                                        <p>{{$progressflow->dhamcq_password}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHAMCQ Email Sent</h5>
                                        <p>{{$progressflow->dhamcq_email_sent}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Book Provided</h5>
                                        <p>{{$progressflow->books_provided}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">BLS Training Completed Date</h5>
                                        <p>{{$progressflow->bls_training_completed_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Good Standing Certificate Issue Date</h5>
                                        <p>{{$progressflow->good_standing_certificate_issue_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Equivalent Certificate</h5>
                                        <p>{{$progressflow->equivalent_certificate}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHa Email Account</h5>
                                        <p>{{$progressflow->dha_email_account}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Unique ID</h5>
                                        <p>{{$progressflow->dha_unique_id}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA UserName</h5>
                                        <p>{{$progressflow->dha_username}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Password</h5>
                                        <p>{{$progressflow->dha_password}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Applicanf REF Number</h5>
                                        <p>{{$progressflow->dha_application_ref_number}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Fee First Installment</h5>
                                        <p>{{$progressflow->dha_fees_first_installment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">First Installment Paid Date</h5>
                                        <p>{{$progressflow->first_installment_paid_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">First Installment Mode Of Payment</h5>
                                        <p>{{$progressflow->first_installment_mode_of_payment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">First Installment Received By</h5>
                                        <p>{{$progressflow->first_installment_received_by}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Fee Second Installment</h5>
                                        <p>{{$progressflow->dha_fees_second_installment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Second Installment Paid Date</h5>
                                        <p>{{$progressflow->second_installment_paid_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Second Installment Mode Of Payment</h5>
                                        <p>{{$progressflow->second_installment_mode_of_payment}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Second Installment Received By</h5>
                                        <p>{{$progressflow->second_installment_received_by}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DataFlow Email</h5>
                                        <p>{{$progressflow->dataflow_email}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DataFlow UserName</h5>
                                        <p>{{$progressflow->dataflow_username}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DataFlow Password</h5>
                                        <p>{{$progressflow->dataflow_password}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DataFlow REF Number</h5>
                                        <p>{{$progressflow->dataflow_ref_no}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">DHA Exam Eligibility ID</h5>
                                        <p>{{$progressflow->dha_exam_eligibility_id}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Eligibility Date</h5>
                                        <p>{{$progressflow->eligibility_date}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Exam Date Confirmed</h5>
                                        <p>{{$progressflow->exam_date_confirmed}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Send Confirmation To Candidate</h5>
                                        <p>{{$progressflow->send_confirmation_to_candidate}}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="text-primary">Exam Result</h5>
                                        <p>{{$progressflow->exam_result}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="text-primary">Data Flow Report</h5>
                                        <p>{{$progressflow->data_flow_report}}</p>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="text-primary">Remarks</h5>
                                        <p>{{$progressflow->remarks}}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection