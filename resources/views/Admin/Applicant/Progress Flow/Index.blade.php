@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Progress Flow</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Progress Flow</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Progress Flow</header>
                                <div class="cards pull-right">
                                    <a href="{{route('ProgressFlow.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>APPLICANT'S NAME</th>
                                            <th>PROFESSION</th>
                                            <th>EMAIL</th>
                                            <th>CONTACT NUMBER</th>
                                            <th>DATE OF BIRTH</th>
                                            <th>PASSPORT NUMBER</th>
                                            <th>SIGNED BY APPLICANT</th>
                                            <th>SIGNED DOCS</th>
                                            <th>SERVICE CHARGE</th>
                                            <th>SERVICE PAID DATE</th>
                                            <th>SERVICE MODE OF PAYMENT</th>
                                            <th>SERVICE CHARGE RECEIVED BY</th>
                                            <th>DHAMCQ FEE</th>
                                            <th>DHAMCQ MODE OF PAYMENT</th>
                                            <th>DHAMCQ SUBJECT</th>
                                            <th>DHAMCQ USERNAME</th>
                                            <th>DHAMCQ PASSWORD</th>
                                            <th>DHAMCQ EMAIL SENT</th>
                                            <th>BOOKS PROVIDED</th>
                                            <th>BLS TRAINING COMPLETED DATE</th>
                                            <th>GOOD STANDING CERTIFICATE ISSUE DATE</th>
                                            <th>EQUIVALENT CERTIFICATE</th>
                                            <th>DHA EMAIL ACCOUNT</th>
                                            <th>DHA UNIQUE ID</th>
                                            <th>DHA USERNAME</th>
                                            <th>DHA PASSWORD</th>
                                            <th>DHA APPLICATION REF NUMBER</th>
                                            <th>DHA FEES FIRST INSTALLMENT</th>
                                            <th>FIRST INSTALLMENT PAID DATE</th>
                                            <th>FIRST INSTALLMENT MODE OF PAYMENT</th>
                                            <th>FIRST INSTALLMENT RECEIVED BY</th>
                                            <th>DHA FEES SECOND INSTALLMENT</th>
                                            <th>SECOND INSTALLMENT PAID DATE</th>
                                            <th>SECOND INSTALLMENT MODE OF PAYMENT</th>
                                            <th>SECOND INSTALLMENT RECEIVED BY</th>
                                            <th>DATAFLOW EMAIL</th>
                                            <th>DATAFLOW USERNAME</th>
                                            <th>DATAFLOW PASSWORD</th>
                                            <th>DATAFLOW REF NO</th>
                                            <th>DHA EXAM ELIGIBILITY ID</th>
                                            <th>ELIGIBILITY DATE</th>
                                            <th>EXAM DATE CONFIRMED</th>
                                            <th>SEND CONFIRMATION TO CANDIDATE</th>
                                            <th>EXAM RESULT</th>
                                            <th>DATA FLOW REPORT</th>
                                            <th>REMARKS</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($progressflow as $progressflow)
                                            <tr>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$progressflow->applicant_id)}}">{{$progressflow->Applicant_ProgressFlow->first_name}} {{$progressflow->Applicant_ProgressFlow->middle_name}} {{$progressflow->Applicant_ProgressFlow->last_name}}</a>
                                                </td>
                                                <td>{{$progressflow->profession}}</td>
                                                <td>{{$progressflow->email}}</td>
                                                <td>{{$progressflow->contact_number}}</td>
                                                <td>{{$progressflow->date_of_birth}}</td>
                                                <td>{{$progressflow->passport_number}}</td>
                                                <td>{{$progressflow->signed_by_applicant}}</td>
                                                @if($progressflow->signed_docs)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Progress flow/'.$progressflow->signed_docs)}}">Signed
                                                            Docs</a></td>
                                                @else
                                                    <td>No Signed Document</td>
                                                @endif
                                                <td>{{$progressflow->service_charge}}</td>
                                                <td>{{$progressflow->service_paid_date}}</td>
                                                <td>{{$progressflow->service_mode_of_payment}}</td>
                                                <td>{{$progressflow->service_charge_received_by}}</td>
                                                <td>{{$progressflow->dhamcq_fee}}</td>
                                                <td>{{$progressflow->dhamcq_mode_of_payment}}</td>
                                                <td>{{$progressflow->dhamcq_subject}}</td>
                                                <td>{{$progressflow->dhamcq_username}}</td>
                                                <td>{{$progressflow->dhamcq_password}}</td>
                                                <td>{{$progressflow->dhamcq_email_sent}}</td>
                                                <td>{{$progressflow->books_provided}}</td>
                                                <td>{{$progressflow->bls_training_completed_date}}</td>
                                                <td>{{$progressflow->good_standing_certificate_issue_date}}</td>
                                                <td>{{$progressflow->equivalent_certificate}}</td>
                                                <td>{{$progressflow->dha_email_account}}</td>
                                                <td>{{$progressflow->dha_unique_id}}</td>
                                                <td>{{$progressflow->dha_username}}</td>
                                                <td>{{$progressflow->dha_password}}</td>
                                                <td>{{$progressflow->dha_application_ref_number}}</td>
                                                <td>{{$progressflow->dha_fees_first_installment}}</td>
                                                <td>{{$progressflow->first_installment_paid_date}}</td>
                                                <td>{{$progressflow->first_installment_mode_of_payment}}</td>
                                                <td>{{$progressflow->first_installment_received_by}}</td>
                                                <td>{{$progressflow->dha_fees_second_installment}}</td>
                                                <td>{{$progressflow->second_installment_paid_date}}</td>
                                                <td>{{$progressflow->second_installment_mode_of_payment}}</td>
                                                <td>{{$progressflow->second_installment_received_by}}</td>
                                                <td>{{$progressflow->dataflow_email}}</td>
                                                <td>{{$progressflow->dataflow_username}}</td>
                                                <td>{{$progressflow->dataflow_password}}</td>
                                                <td>{{$progressflow->dataflow_ref_no}}</td>
                                                <td>{{$progressflow->dha_exam_eligibility_id}}</td>
                                                <td>{{$progressflow->eligibility_date}}</td>
                                                <td>{{$progressflow->exam_date_confirmed}}</td>
                                                <td>{{$progressflow->send_confirmation_to_candidate}}</td>
                                                <td>{{$progressflow->exam_result}}</td>
                                                <td>{{$progressflow->data_flow_report}}</td>
                                                <td>{{$progressflow->remarks}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <form action="{{ route('ProgressFlow.edit', $progressflow->id)}}"
                                                              method="GET"
                                                              style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('PUT')}}
                                                            <button class="btn btn-primary btn-sm" type="submit">Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('ProgressFlow.destroy', $progressflow->id)}}"
                                                              method="post" style="display: inline-block">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-danger btn-sm" type="submit">Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection