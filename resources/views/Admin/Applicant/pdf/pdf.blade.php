<style type="text/css">
    table {
        width: 100%;
        margin-bottom: 30px;
    }

    table tbody {
        font-size: 13px !important;
        font-weight: 300 !important;
    }

    table tbody tr td {
        font-size: 14px !important;
        font-weight: 300 !important;
    }

    .center {
        text-align: center;
    }

    .h1Style {
        display: block;
        text-align: center;
        color: #e3342f;
    }

    .thbg {
        background: #007bff;
        color: #fff;
    }
</style>
@if($applicant)
    <h1 class="h1Style">Applicant's Detail</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Id</th>
            <th style="width:25%;padding:7px">First Name</th>
            <th style="width:25%;padding:7px">Middle Name</th>
            <th style="width:25%;padding:7px">Last Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->id}}</td>
            <td class="font center" style="height:30px">{{$applicant->first_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->middle_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->last_name}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Gender</th>
            <th style="width:25%;padding:7px">Date OF Birth</th>
            <th style="width:25%;padding:7px">Address</th>
            <th style="width:25%;padding:7px">Subject</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->gender}}</td>
            <td class="font center" style="height:30px">{{$applicant->dob}}</td>
            <td class="font center" style="height:30px">{{$applicant->address}}</td>
            <td class="font center" style="height:30px">{{$applicant->subject}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Qualification</th>
            <th style="width:25%;padding:7px">Experience</th>
            <th style="width:25%;padding:7px">Interested Country</th>
            <th style="width:25%;padding:7px">Interested Service</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->qualification}}</td>
            <td class="font center" style="height:30px">{{$applicant->experience}}</td>
            <td class="font center" style="height:30px">{{$applicant->country_interested}}</td>
            <td class="font center" style="height:30px">{{$applicant->service_interested}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Maiden Name</th>
            <th style="width:25%;padding:7px">Identity Type</th>
            <th style="width:25%;padding:7px">Citizenship Number</th>
            <th style="width:25%;padding:7px">Passport Number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->maiden_name}}</td>
            <td class="font center" style="height:30px">{{$applicant->identity_type}}</td>
            <td class="font center" style="height:30px">{{$applicant->citizen_no}}</td>
            <td class="font center" style="height:30px">{{$applicant->passport_no}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Mobile Number</th>
            <th style="width:25%;padding:7px">Nationality</th>
            <th style="width:25%;padding:7px">Email</th>
            <th style="width:25%;padding:7px">Passport Document</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->phone}}</td>
            <td class="font center" style="height:30px">{{$applicant->nationality}}</td>
            <td class="font center" style="height:30px">{{$applicant->email}}</td>
            <td class="font center" style="height:30px"> @if($applicant->passport_docs)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Click here
                            for Passport
                            Document</a>
                @else
                    <p>No Document File</p>
                @endif</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Status</th>
            <th style="width:25%;padding:7px">Applicant Profession</th>
            <th style="width:25%;padding:7px">Color Code</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$applicant->status}}</td>
            <td class="font center" style="height:30px">{{@$applicant->Category_Applicant->Name}}</td>
            <td class="font center" style="height:30px">{{@$applicant->color_code}}</td>
        </tr>
        </tbody>
    </table>
@endif
@if($checklist)
    <h1 class="h1Style">Applicant's Document Checklist</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">MRP Size Photo</th>
            <th style="width:50%;padding:7px">Passport</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->mrp_size_photo}}</td>
            <td class="font center" style="height:30px">{{$checklist->passport}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Citizen</th>
            <th style="width:50%;padding:7px">SLC Marksheet</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->citizen}}</td>
            <td class="font center" style="height:30px">{{$checklist->slc_marksheet}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">SLC Certificate</th>
            <th style="width:50%;padding:7px">SLC Character Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->slc_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->slc_character_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">+2 Transcript</th>
            <th style="width:50%;padding:7px">+2 Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->plus2transcript}}</td>
            <td class="font center" style="height:30px">{{$checklist->plus2certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">+2 Character Certificate</th>
            <th style="width:50%;padding:7px">PCL/Diploma Transcript</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->plus2character_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->diploma_transcript}}</td>
        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">PCL/Diploma Certificate</th>
            <th style="width:50%;padding:7px">PCL/Diploma Character Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->diploma_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->diploma_character_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Equivalent Certificate</th>
            <th style="width:50%;padding:7px">Council Registration Certificate Front</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->equivalent_certificate}}</td>
            <td class="font center" style="height:30px">{{$checklist->council_registration_certificate_front}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Council Registration Certificate Back</th>
            <th style="width:50%;padding:7px">Council Good Standing Letter</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->council_registration_certificate_back}}</td>
            <td class="font center" style="height:30px">{{$checklist->council_good_standing_letter}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Work Experience Letter 1</th>
            <th style="width:50%;padding:7px">Work Experience Letter 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter1}}</td>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter2}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Work Experience Letter 3</th>
            <th style="width:50%;padding:7px">Basic Life Support For Certificate</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->work_experience_letter3}}</td>
            <td class="font center" style="height:30px">{{$checklist->basic_life_support_certificate}}</td>
        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:50%;padding:7px">Signed Letter of Authorization</th>
            <th style="width:50%;padding:7px">Signed Service Agreement</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$checklist->signed_letter_authorization}}</td>
            <td class="font center" style="height:30px">{{$checklist->signed_service_agreement}}</td>
        </tr>
        </tbody>
    </table>
@endif
@if($education)
    <h1 class="h1Style">Applicant's Education Detail1</h1>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Name</th>
            <th style="width:25%;padding:7px">Authority's Address</th>
            <th style="width:25%;padding:7px">Authority's City</th>
            <th style="width:25%;padding:7px">Authority's State</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education->authority_name}}</td>
            <td class="font center" style="height:30px">{{$education->authority_city}}</td>
            <td class="font center" style="height:30px">{{$education->authority_state}}</td>
            <td class="font center" style="height:30px">{{$education->authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Country</th>
            <th style="width:25%;padding:7px">Authority's Country Code</th>
            <th style="width:25%;padding:7px">Authority's Phone</th>
            <th style="width:25%;padding:7px">Authority's Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education->authority_country}}</td>
            <td class="font center" style="height:30px">{{$education->authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$education->authority_phone}}</td>
            <td class="font center" style="height:30px">{{$education->authority_email}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Website</th>
            <th style="width:25%;padding:7px">Qualification</th>
            <th style="width:25%;padding:7px">Institution</th>
            <th style="width:25%;padding:7px">Mode</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education->authority_website}}</td>
            <td class="font center" style="height:30px">{{$education->qualification}}</td>
            <td class="font center" style="height:30px">{{$education->institution}}</td>
            <td class="font center" style="height:30px">{{$education->mode}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Major Subject</th>
            <th style="width:25%;padding:7px">Minor Subject</th>
            <th style="width:25%;padding:7px">Roll</th>
            <th style="width:25%;padding:7px">Study From</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education->major_subject}}</td>
            <td class="font center" style="height:30px">{{$education->minor_subject}}</td>
            <td class="font center" style="height:30px">{{$education->roll}}</td>
            <td class="font center" style="height:30px">{{$education->study_from}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Study To</th>
            <th style="width:25%;padding:7px">Confered Date</th>
            <th style="width:25%;padding:7px">Degree Issue Date</th>
            <th style="width:25%;padding:7px">Expected Degree Issue Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education->study_to}}</td>
            <td class="font center" style="height:30px">{{$education->conferred_date}}</td>
            <td class="font center" style="height:30px">{{$education->degree_issue_date}}</td>
            <td class="font center" style="height:30px">{{$education->expected_degree_issue_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Qualification Certificate</th>
            <th style="width:25%;padding:7px">Character Certificate</th>
            <th style="width:25%;padding:7px">Marksheet</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">@if($education->qualification_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education->qualification_certificate)}}">Click
                            here for Qualification
                            Certificate</a></p>
                @else
                    <p>No Qualification Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education->character_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education->character_certificate)}}">Click
                            here for Character
                            Certificate</a></p>
                @else
                    <p>No Character Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education->marksheet)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education->marksheet)}}">Click
                            Here for MarkSheet</a></p>
                @else
                    <p>No Marksheet found</p>
                @endif</td>
        </tr>
        </tbody>
    </table>
@endif
@if($education2)
    <h1 class="h1Style">Applicant's Second Education Detail1</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Name</th>
            <th style="width:25%;padding:7px">Authority's Address</th>
            <th style="width:25%;padding:7px">Authority's City</th>
            <th style="width:25%;padding:7px">Authority's State</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education2->authority_name}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_city}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_state}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Country</th>
            <th style="width:25%;padding:7px">Authority's Country Code</th>
            <th style="width:25%;padding:7px">Authority's Phone</th>
            <th style="width:25%;padding:7px">Authority's Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education2->authority_country}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_phone}}</td>
            <td class="font center" style="height:30px">{{$education2->authority_email}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Website</th>
            <th style="width:25%;padding:7px">Qualification</th>
            <th style="width:25%;padding:7px">Institution</th>
            <th style="width:25%;padding:7px">Mode</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education2->authority_website}}</td>
            <td class="font center" style="height:30px">{{$education2->qualification}}</td>
            <td class="font center" style="height:30px">{{$education2->institution}}</td>
            <td class="font center" style="height:30px">{{$education2->mode}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Major Subject</th>
            <th style="width:25%;padding:7px">Minor Subject</th>
            <th style="width:25%;padding:7px">Roll</th>
            <th style="width:25%;padding:7px">Study From</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education2->major_subject}}</td>
            <td class="font center" style="height:30px">{{$education2->minor_subject}}</td>
            <td class="font center" style="height:30px">{{$education2->roll}}</td>
            <td class="font center" style="height:30px">{{$education2->study_from}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Study To</th>
            <th style="width:25%;padding:7px">Confered Date</th>
            <th style="width:25%;padding:7px">Degree Issue Date</th>
            <th style="width:25%;padding:7px">Expected Degree Issue Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education2->study_to}}</td>
            <td class="font center" style="height:30px">{{$education2->conferred_date}}</td>
            <td class="font center" style="height:30px">{{$education2->degree_issue_date}}</td>
            <td class="font center" style="height:30px">{{$education2->expected_degree_issue_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Qualification Certificate</th>
            <th style="width:25%;padding:7px">Character Certificate</th>
            <th style="width:25%;padding:7px">Marksheet</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">@if($education2->qualification_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education2->qualification_certificate)}}">Click
                            here for Qualification
                            Certificate</a></p>
                @else
                    <p>No Qualification Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education2->character_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education2->character_certificate)}}">Click
                            here for Character
                            Certificate</a></p>
                @else
                    <p>No Character Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education2->marksheet)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education2->marksheet)}}">Click
                            Here for MarkSheet</a></p>
                @else
                    <p>No Marksheet found</p>
                @endif</td>
        </tr>
        </tbody>
    </table>
@endif
@if($education3)
    <h1 class="h1Style">Applicant's Third Education Detail1</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Name</th>
            <th style="width:25%;padding:7px">Authority's Address</th>
            <th style="width:25%;padding:7px">Authority's City</th>
            <th style="width:25%;padding:7px">Authority's State</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education3->authority_name}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_city}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_state}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Country</th>
            <th style="width:25%;padding:7px">Authority's Country Code</th>
            <th style="width:25%;padding:7px">Authority's Phone</th>
            <th style="width:25%;padding:7px">Authority's Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education3->authority_country}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_phone}}</td>
            <td class="font center" style="height:30px">{{$education3->authority_email}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Authority's Website</th>
            <th style="width:25%;padding:7px">Qualification</th>
            <th style="width:25%;padding:7px">Institution</th>
            <th style="width:25%;padding:7px">Mode</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education3->authority_website}}</td>
            <td class="font center" style="height:30px">{{$education3->qualification}}</td>
            <td class="font center" style="height:30px">{{$education3->institution}}</td>
            <td class="font center" style="height:30px">{{$education3->mode}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Major Subject</th>
            <th style="width:25%;padding:7px">Minor Subject</th>
            <th style="width:25%;padding:7px">Roll</th>
            <th style="width:25%;padding:7px">Study From</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education3->major_subject}}</td>
            <td class="font center" style="height:30px">{{$education3->minor_subject}}</td>
            <td class="font center" style="height:30px">{{$education3->roll}}</td>
            <td class="font center" style="height:30px">{{$education3->study_from}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Study To</th>
            <th style="width:25%;padding:7px">Confered Date</th>
            <th style="width:25%;padding:7px">Degree Issue Date</th>
            <th style="width:25%;padding:7px">Expected Degree Issue Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$education3->study_to}}</td>
            <td class="font center" style="height:30px">{{$education3->conferred_date}}</td>
            <td class="font center" style="height:30px">{{$education3->degree_issue_date}}</td>
            <td class="font center" style="height:30px">{{$education3->expected_degree_issue_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Qualification Certificate</th>
            <th style="width:25%;padding:7px">Character Certificate</th>
            <th style="width:25%;padding:7px">Marksheet</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">@if($education3->qualification_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education3->qualification_certificate)}}">Click
                            here for Qualification
                            Certificate</a></p>
                @else
                    <p>No Qualification Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education3->character_certificate)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education3->character_certificate)}}">Click
                            here for Character
                            Certificate</a></p>
                @else
                    <p>No Character Certificate Found</p>
                @endif</td>
            <td class="font center" style="height:30px"> @if($education3->marksheet)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Education/'.$education3->marksheet)}}">Click
                            Here for MarkSheet</a></p>
                @else
                    <p>No Marksheet found</p>
                @endif</td>
        </tr>
        </tbody>
    </table>
@endif
@if($healthlisence)
    <h1 class="h1Style">Applicant's Health License Detail</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlisence->professional_designation}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->issuing_authority_country}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->issuing_authority_city}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">License Conferred date</th>
            <th style="width:25%;padding:7px">License Expiry Date</th>
            <th style="width:25%;padding:7px">License Type</th>
            <th style="width:25%;padding:7px">License Number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlisence->license_conferred_date}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->license_expiry_date}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->license_type}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->license_number}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">License Status</th>
            <th style="width:25%;padding:7px">License Attained</th>
            <th style="width:25%;padding:7px">License Copy</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlisence->license_status}}</td>
            <td class="font center" style="height:30px">{{$healthlisence->license_attained}}</td>
            <td class="font center" style="height:30px"> @if($healthlisence->license_copy)
                    <p><a target="_blank" style="color: blue"
                          href="{{asset('/upload/Health License/'.$healthlisence->license_copy)}}">click
                            here License Copy</a></p>
                @else
                    <p>No License copy Found</p>
                @endif</td>

        </tr>
        </tbody>
    </table>
@endif
@if($healthlicense2)
    <h1 class="h1Style">Applicant's Second Health License Detail</h1>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlicense2->professional_designation}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->issuing_authority_country}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->issuing_authority_city}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">License Conferred date</th>
            <th style="width:25%;padding:7px">License Expiry Date</th>
            <th style="width:25%;padding:7px">License Type</th>
            <th style="width:25%;padding:7px">License Number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlicense2->license_conferred_date}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->license_expiry_date}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->license_type}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->license_number}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">License Status</th>
            <th style="width:25%;padding:7px">License Attained</th>
            <th style="width:25%;padding:7px">License Copy</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$healthlicense2->license_status}}</td>
            <td class="font center" style="height:30px">{{$healthlicense2->license_attained}}</td>
            <td class="font center" style="height:30px"> @if($healthlicense2->license_copy)
                    <p><a target="_blank" style="color: blue"
                          href="{{asset('/upload/Health License/'.$healthlicense2->license_copy)}}">click
                            here License Copy</a></p>
                @else
                    <p>No License copy Found</p>
                @endif</td>

        </tr>
        </tbody>
    </table>
@endif
@if($employment)
    <h1 class="h1Style">Applicant's Employment Detail</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Address</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment->designation}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_address}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority State</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
            <th style="width:25%;padding:7px">Issuing Authority Country Code</th>
            <th style="width:25%;padding:7px">Issuing Authority Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_state}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_city}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_phone}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority Email</th>
            <th style="width:25%;padding:7px">Issuing Authority Website</th>
            <th style="width:25%;padding:7px">Reason For Leaving</th>
            <th style="width:25%;padding:7px">Nature of Employment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_email}}</td>
            <td class="font center" style="height:30px">{{$employment->issuing_authority_website}}</td>
            <td class="font center" style="height:30px">{{$employment->reason_for_leaving}}</td>
            <td class="font center" style="height:30px">{{$employment->nature_of_employment}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Employment From</th>
            <th style="width:25%;padding:7px">Employment To</th>
            <th style="width:25%;padding:7px">Employee Code</th>
            <th style="width:25%;padding:7px">Department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment->employment_from}}</td>
            <td class="font center" style="height:30px">{{$employment->employment_to}}</td>
            <td class="font center" style="height:30px">{{$employment->employee_code}}</td>
            <td class="font center" style="height:30px">{{$employment->department}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Experience Letter</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px"> @if($employment->experience_letter)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Employment/'.$employment->experience_letter)}}">Click
                            Here Experience Letter</a></p>
                @else
                    <p>No Experience letter found</p>
                @endif</td>


        </tr>
        </tbody>
    </table>
@endif
@if($employment2)
    <h1 class="h1Style">Applicant's Second Employment Detail</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Address</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment2->designation}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_address}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority State</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
            <th style="width:25%;padding:7px">Issuing Authority Country Code</th>
            <th style="width:25%;padding:7px">Issuing Authority Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_state}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_city}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_phone}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority Email</th>
            <th style="width:25%;padding:7px">Issuing Authority Website</th>
            <th style="width:25%;padding:7px">Reason For Leaving</th>
            <th style="width:25%;padding:7px">Nature of Employment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_email}}</td>
            <td class="font center" style="height:30px">{{$employment2->issuing_authority_website}}</td>
            <td class="font center" style="height:30px">{{$employment2->reason_for_leaving}}</td>
            <td class="font center" style="height:30px">{{$employment2->nature_of_employment}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Employment From</th>
            <th style="width:25%;padding:7px">Employment To</th>
            <th style="width:25%;padding:7px">Employee Code</th>
            <th style="width:25%;padding:7px">Department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment2->employment_from}}</td>
            <td class="font center" style="height:30px">{{$employment2->employment_to}}</td>
            <td class="font center" style="height:30px">{{$employment2->employee_code}}</td>
            <td class="font center" style="height:30px">{{$employment2->department}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Experience Letter</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px"> @if($employment2->experience_letter)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Employment/'.$employment2->experience_letter)}}">Click
                            Here Experience Letter</a></p>
                @else
                    <p>No Experience letter found</p>
                @endif</td>


        </tr>
        </tbody>
    </table>


@endif
@if($employment3)
    <h1 class="h1Style">Applicant's Third Employment Detail</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Address</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment3->designation}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_address}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority State</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
            <th style="width:25%;padding:7px">Issuing Authority Country Code</th>
            <th style="width:25%;padding:7px">Issuing Authority Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_state}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_city}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_phone}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority Email</th>
            <th style="width:25%;padding:7px">Issuing Authority Website</th>
            <th style="width:25%;padding:7px">Reason For Leaving</th>
            <th style="width:25%;padding:7px">Nature of Employment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_email}}</td>
            <td class="font center" style="height:30px">{{$employment3->issuing_authority_website}}</td>
            <td class="font center" style="height:30px">{{$employment3->reason_for_leaving}}</td>
            <td class="font center" style="height:30px">{{$employment3->nature_of_employment}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Employment From</th>
            <th style="width:25%;padding:7px">Employment To</th>
            <th style="width:25%;padding:7px">Employee Code</th>
            <th style="width:25%;padding:7px">Department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment3->employment_from}}</td>
            <td class="font center" style="height:30px">{{$employment3->employment_to}}</td>
            <td class="font center" style="height:30px">{{$employment3->employee_code}}</td>
            <td class="font center" style="height:30px">{{$employment3->department}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Experience Letter</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px"> @if($employment3->experience_letter)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Employment/'.$employment3->experience_letter)}}">Click
                            Here Experience Letter</a></p>
                @else
                    <p>No Experience letter found</p>
                @endif</td>


        </tr>
        </tbody>
    </table>
@endif

@if($employment4)
    <h1 class="h1Style">Applicant's Fourth Employment Detail</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Address</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment4->designation}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_address}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority State</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
            <th style="width:25%;padding:7px">Issuing Authority Country Code</th>
            <th style="width:25%;padding:7px">Issuing Authority Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_state}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_city}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_phone}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority Email</th>
            <th style="width:25%;padding:7px">Issuing Authority Website</th>
            <th style="width:25%;padding:7px">Reason For Leaving</th>
            <th style="width:25%;padding:7px">Nature of Employment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_email}}</td>
            <td class="font center" style="height:30px">{{$employment4->issuing_authority_website}}</td>
            <td class="font center" style="height:30px">{{$employment4->reason_for_leaving}}</td>
            <td class="font center" style="height:30px">{{$employment4->nature_of_employment}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Employment From</th>
            <th style="width:25%;padding:7px">Employment To</th>
            <th style="width:25%;padding:7px">Employee Code</th>
            <th style="width:25%;padding:7px">Department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment4->employment_from}}</td>
            <td class="font center" style="height:30px">{{$employment4->employment_to}}</td>
            <td class="font center" style="height:30px">{{$employment4->employee_code}}</td>
            <td class="font center" style="height:30px">{{$employment4->department}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Experience Letter</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px"> @if($employment4->experience_letter)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Employment/'.$employment4->experience_letter)}}">Click
                            Here Experience Letter</a></p>
                @else
                    <p>No Experience letter found</p>
                @endif</td>


        </tr>
        </tbody>
    </table>
@endif
@if($employment5)
    <h1 class="h1Style">Applicant's Fifth Employment Detail</h1>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Designation</th>
            <th style="width:25%;padding:7px">Issuing Authority Name</th>
            <th style="width:25%;padding:7px">Issuing Authority Address</th>
            <th style="width:25%;padding:7px">Issuing Authority Country</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment5->designation}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_name}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_address}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_country}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority State</th>
            <th style="width:25%;padding:7px">Issuing Authority City</th>
            <th style="width:25%;padding:7px">Issuing Authority Country Code</th>
            <th style="width:25%;padding:7px">Issuing Authority Phone</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_state}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_city}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_country_code}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_phone}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Issuing Authority Email</th>
            <th style="width:25%;padding:7px">Issuing Authority Website</th>
            <th style="width:25%;padding:7px">Reason For Leaving</th>
            <th style="width:25%;padding:7px">Nature of Employment</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_email}}</td>
            <td class="font center" style="height:30px">{{$employment5->issuing_authority_website}}</td>
            <td class="font center" style="height:30px">{{$employment5->reason_for_leaving}}</td>
            <td class="font center" style="height:30px">{{$employment5->nature_of_employment}}</td>

        </tr>
        </tbody>
    </table>
    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Employment From</th>
            <th style="width:25%;padding:7px">Employment To</th>
            <th style="width:25%;padding:7px">Employee Code</th>
            <th style="width:25%;padding:7px">Department</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$employment5->employment_from}}</td>
            <td class="font center" style="height:30px">{{$employment5->employment_to}}</td>
            <td class="font center" style="height:30px">{{$employment5->employee_code}}</td>
            <td class="font center" style="height:30px">{{$employment5->department}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Experience Letter</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px"> @if($employment5->experience_letter)
                    <p><a target="_blank"
                          style="color: blue"
                          href="{{asset('/upload/Employment/'.$employment5->experience_letter)}}">Click
                            Here Experience Letter</a></p>
                @else
                    <p>No Experience letter found</p>
                @endif</td>


        </tr>
        </tbody>
    </table>
@endif
@if($progressflow)
    <h1 class="h1Style">Applicant Progress Flow Report</h1>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Profession</th>
            <th style="width:25%;padding:7px">Email</th>
            <th style="width:25%;padding:7px">Contact Number</th>
            <th style="width:25%;padding:7px">Date of Birth</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->profession}}</td>
            <td class="font center" style="height:30px">{{$progressflow->email}}</td>
            <td class="font center" style="height:30px">{{$progressflow->contact_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->date_of_birth}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Passport Number</th>
            <th style="width:25%;padding:7px">Signed By Appliant?</th>
            <th style="width:25%;padding:7px">Service Agreement Document</th>
            <th style="width:25%;padding:7px">Service Charge</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->passport_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->signed_by_applicant}}</td>
            <td class="font center" style="height:30px">@if($progressflow->signed_docs)
                    <a target="_blank"
                       style="color: blue"
                       href="{{asset('/upload/Progress flow/'.$progressflow->signed_docs)}}">Click
                        here for Service Agreement Document</a>
                @else
                    <p>No Signed document found</p>
                @endif</td>
            <td class="font center" style="height:30px">{{$progressflow->service_charge}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Service Paid Date</th>
            <th style="width:25%;padding:7px">Service Mode Of Payment</th>
            <th style="width:25%;padding:7px">Service Charge Received By</th>
            <th style="width:25%;padding:7px">DHAMCQ Fee</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->service_paid_date}}</td>
            <td class="font center" style="height:30px">{{$progressflow->service_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->service_charge_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_fee}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHAMCQ Mode Of Payment</th>
            <th style="width:25%;padding:7px">DHAMCQ Subject</th>
            <th style="width:25%;padding:7px">DHAMCQ UserName</th>
            <th style="width:25%;padding:7px">DHAMCQ Password</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_subject}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_username}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_password}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHAMCQ Email Sent</th>
            <th style="width:25%;padding:7px">Book Provided</th>
            <th style="width:25%;padding:7px">BLS Training Completed Date</th>
            <th style="width:25%;padding:7px">Good Standing Certificate Issue Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dhamcq_email_sent}}</td>
            <td class="font center" style="height:30px">{{$progressflow->books_provided}}</td>
            <td class="font center" style="height:30px">{{$progressflow->bls_training_completed_date}}</td>
            <td class="font center" style="height:30px">{{$progressflow->good_standing_certificate_issue_date}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Equivalent Certificate</th>
            <th style="width:25%;padding:7px">DHa Email Account</th>
            <th style="width:25%;padding:7px">DHA Unique ID</th>
            <th style="width:25%;padding:7px">DHA UserName</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->equivalent_certificate}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_email_account}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_unique_id}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_username}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DHA Password</th>
            <th style="width:25%;padding:7px">DHA Applicanf REF Number</th>
            <th style="width:25%;padding:7px">DHA Fee First Installment</th>
            <th style="width:25%;padding:7px">First Installment Paid Dates</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dha_password}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_application_ref_number}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_fees_first_installment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_paid_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">First Installment Mode Of Payment</th>
            <th style="width:25%;padding:7px">First Installment Received By</th>
            <th style="width:25%;padding:7px">DHA Fee Second Installment</th>
            <th style="width:25%;padding:7px">Second Installment Paid Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->first_installment_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_fees_second_installment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_paid_date}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Second Installment Mode Of Payment</th>
            <th style="width:25%;padding:7px">Second Installment Received By</th>
            <th style="width:25%;padding:7px">DataFlow Email</th>
            <th style="width:25%;padding:7px">DataFlow UserName</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_mode_of_payment}}</td>
            <td class="font center" style="height:30px">{{$progressflow->second_installment_received_by}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_email}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_username}}</td>

        </tr>
        </tbody>
    </table>


    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">DataFlow Password</th>
            <th style="width:25%;padding:7px">DataFlow REF Number</th>
            <th style="width:25%;padding:7px">DHA Exam Eligibility ID</th>
            <th style="width:25%;padding:7px">Eligibility Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_password}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dataflow_ref_no}}</td>
            <td class="font center" style="height:30px">{{$progressflow->dha_exam_eligibility_id}}</td>
            <td class="font center" style="height:30px">{{$progressflow->eligibility_date}}</td>

        </tr>
        </tbody>
    </table>

    <table>
        <thead>
        <tr class="thbg">
            <th style="width:25%;padding:7px">Exam Date Confirmed</th>
            <th style="width:25%;padding:7px">Send Confirmation To Candidate</th>
            <th style="width:25%;padding:7px">Exam Result</th>
            <th style="width:25%;padding:7px">Data Flow Report</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->exam_date_confirmed}}</td>
            <td class="font center" style="height:30px">{{$progressflow->send_confirmation_to_candidate}}</td>
            <td class="font center" style="height:30px">{{$progressflow->exam_result}}</td>
            <td class="font center" style="height:30px">{{$progressflow->data_flow_report}}</td>
        </tr>
        </tbody>
    </table>



    <table>
        <thead>
        <tr class="thbg">
            <th style="width:100%;padding:7px">Remarks</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font center" style="height:30px">{{$progressflow->remarks}}</td>
        </tr>
        </tbody>
    </table>
@endif
