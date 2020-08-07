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
                                                 href="{{route('ProgressFlow.index')}}">Applicant Progress Flow
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant Progress Flow Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('ProgressFlow.update',$progressflow->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Applicant*</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"  name="applicant_id">
                                        <option value="" selected disabled>select Appliant</option>
                                        @foreach($applicant as $applicant)
                                            <option @if($progressflow->applicant_id==$app) selected @endif value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Profession</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->profession}}" name="profession">
                                        <option  value="" selected disabled>select Profession</option>
                                        <option @if($progressflow->profession=='Registered Nurse') selected @endif value="Registered Nurse" data-select2-id="3">Registered Nurse</option>
                                        <option @if($progressflow->profession=='Assistant Nurse') selected @endif value="Assistant Nurse">Assistant Nurse</option>
                                        <option @if($progressflow->profession=='MBBS Doctor') selected @endif value="MBBS Doctor">MBBS Doctor</option>
                                        <option @if($progressflow->profession=='BBS Doctor') selected @endif value="BBS Doctor">BBS Doctor</option>
                                        <option @if($progressflow->profession=='Specialist Doctor') selected @endif value="Specialist Doctor">Specialist Doctor</option>
                                        <option @if($progressflow->profession=='Allied Health') selected @endif value="Allied Health">Allied Health</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;"> email</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->email}}" name="email"
                                           placeholder="Enter  email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Contact Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->contact_number}}" name="contact_number"
                                           placeholder="Enter Contact Number">
                                    </input>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Date Of Birth</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->date_of_birth}}" name="date_of_birth">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->passport_number}}" name="passport_number"
                                           placeholder="Enter Passport Number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Signed By Applicant</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->signed_by_applicant}}" name="signed_by_applicant">
                                        <option value="" selected disabled>select Profession</option>
                                        <option @if($progressflow->signed_by_applicant=='Yes') selected @endif value="Yes" data-select2-id="3">Yes</option>
                                        <option @if($progressflow->signed_by_applicant=='No') selected @endif value="No">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Signed Document</p>
                                    <input type="file" class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" value="{{$progressflow->signed_docs}}" name="signed_docs"
                                           placeholder="Enter Contact Number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Service Charge</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->service_charge}}" name="service_charge"
                                           placeholder="Enter Service Charge">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Paid Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->service_paid_date}}" name="service_paid_date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Mode Of Payment</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->service_mode_of_payment}}" name="service_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option @if($progressflow->service_mode_of_payment=='Cash') selected @endif value="Cash">Cash</option>
                                        <option @if($progressflow->service_mode_of_payment=='Cheque') selected @endif value="Cheque">Cheque</option>
                                        <option @if($progressflow->service_mode_of_payment=='Bank Deposit') selected @endif value="Bank Deposite">Bank Deposite</option>
                                        <option @if($progressflow->service_mode_of_payment=='E-Sewa') selected @endif value="E-Sewa">E-Sewa</option>
                                        <option @if($progressflow->service_mode_of_payment=='IME') selected @endif value="IME">IME</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Received By</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->service_charge_received_by}}" name="service_charge_received_by"
                                           placeholder="Enter Receiver">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Fee</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->dhamcq_fee}}" name="dhamcq_fee"
                                           placeholder="Enter DHAMCQ Fee">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Mode Of Payment</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->dhamcq_mode_of_payment}}" name="dhamcq_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option @if($progressflow->dhamcq_mode_of_payment=='Cash') selected @endif value="Cash">Cash</option>
                                        <option @if($progressflow->dhamcq_mode_of_payment=='Cheque') selected @endif value="Cheque">Cheque</option>
                                        <option @if($progressflow->dhamcq_mode_of_payment=='Bank Deposit') selected @endif value="Bank Deposite">Bank Deposite</option>
                                        <option @if($progressflow->dhamcq_mode_of_payment=='E-Sewa') selected @endif value="E-Sewa">E-Sewa</option>
                                        <option @if($progressflow->dhamcq_mode_of_payment=='IME') selected @endif value="IME">IME</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Subject</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->dhamcq_subject}}" name="dhamcq_subject"
                                           placeholder="Enter DHAMCQ Subject">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Username</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->dhamcq_username}}" name="dhamcq_username"
                                           placeholder="Enter DHAMCQ Username">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Password</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->dhamcq_password}}" name="dhamcq_password"
                                           placeholder="Enter DHAMCQ Password">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Email Sent</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" value="{{$progressflow->dhamcq_email_sent}}" name="dhamcq_email_sent"
                                           placeholder="Enter DHAMCQ Email Sent">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Bls Training Completed Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->bls_training_completed_date}}" name="bls_training_completed_date"
                                           placeholder="Enter Bls Training Completed Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Good Standing Certificate Issue Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->good_standing_certificate_issue_date}}" name="good_standing_certificate_issue_date"
                                           placeholder="Enter Good Standing Certificate Issue Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Equivalent Certificate
                                        (PCL Only)</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->equivalent_certificate}}" name="equivalent_certificate">
                                        <option value="" selected disabled>select Profession</option>
                                        <option @if($progressflow->equivalent_certificate=='Yes') selected @endif value="Yes" data-select2-id="3">Yes</option>
                                        <option @if($progressflow->equivalent_certificate=='No') selected @endif value="No">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">
                                        Books Provided</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->books_provided}}" name="books_provided">
                                        <option value="" selected disabled>select Profession</option>
                                        <option @if($progressflow->books_provided=='Yes') selected @endif value="Yes" data-select2-id="3">Yes</option>
                                        <option @if($progressflow->books_provided=='No') selected @endif value="No">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Email Account</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_email_account}}" name="dha_email_account"
                                           placeholder="Enter DHA Email Account">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Unique Id</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_unique_id}}" name="dha_unique_id"
                                           placeholder="Enter DHA Unique Id">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Username</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_username}}" name="dha_username"
                                           placeholder="Enter DHA Username">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Password</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_password}}" name="dha_password"
                                           placeholder="Enter DHA Password">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Application Ref Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_application_ref_number}}" name="dha_application_ref_number"
                                           placeholder="Enter DHA Application Ref Number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Fees First Installment</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_fees_first_installment}}" name="dha_fees_first_installment"
                                           placeholder="Enter DHA Fees First Installment">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Paid Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->first_installment_paid_date}}" name="first_installment_paid_date"
                                           placeholder="Enter Paid Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">First Installment Mode Of Payment</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->first_installment_mode_of_payment}}" name="first_installment_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option @if($progressflow->first_installment_mode_of_payment=='Cash') selected @endif value="Cash">Cash</option>
                                        <option @if($progressflow->first_installment_mode_of_payment=='Cheque') selected @endif value="Cheque">Cheque</option>
                                        <option @if($progressflow->first_installment_mode_of_payment=='Bank Deposit') selected @endif value="Bank Deposit">Bank Deposite</option>
                                        <option @if($progressflow->first_installment_mode_of_payment=='E-Sewa') selected @endif value="E-Sewa">E-Sewa</option>
                                        <option @if($progressflow->first_installment_mode_of_payment=='IME') selected @endif value="IME">IME</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Received By</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->first_installment_received_by}}" name="first_installment_received_by"
                                           placeholder="Enter Receiver">
                                    </input>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Fees Second Installment</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_fees_second_installment}}" name="dha_fees_second_installment"
                                           placeholder="Enter DHA Fees Second Installment">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Second installment Paid Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->second_installment_paid_date}}" name="second_installment_paid_date"
                                           placeholder="Enter Paid Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Second installment Mode Of Payment</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->second_installment_mode_of_payment}}" name="second_installment_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option @if($progressflow->second_installment_mode_of_payment=='Cash') selected @endif value="Cash">Cash</option>
                                        <option @if($progressflow->second_installment_mode_of_payment=='Cheque') selected @endif value="Cheque">Cheque</option>
                                        <option @if($progressflow->second_installment_mode_of_payment=='Bank Deposit') selected @endif value="Bank Deposite">Bank Deposite</option>
                                        <option @if($progressflow->second_installment_mode_of_payment=='E-Sewa') selected @endif value="E-Sewa">E-Sewa</option>
                                        <option @if($progressflow->second_installment_mode_of_payment=='IME') selected @endif value="IME">IME</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Second installment Received By</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->second_installment_received_by}}" name="second_installment_received_by"
                                           placeholder="Enter Receiver">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Dataflow Email</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dataflow_email}}" name="dataflow_email"
                                           placeholder="Enter Dataflow Email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Dataflow Username</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dataflow_username}}" name="dataflow_username"
                                           placeholder="Enter Dataflow Username">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Dataflow Password</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dataflow_password}}" name="dataflow_password"
                                           placeholder="Enter Dataflow Password">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Dataflow Ref No</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dataflow_ref_no}}" name="dataflow_ref_no"
                                           placeholder="Enter Dataflow Ref No">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHA Exam Eligibility Id</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->dha_exam_eligibility_id}}" name="dha_exam_eligibility_id"
                                           placeholder="Enter DHA Exam Eligibility Id">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Eligibility Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->eligibility_date}}" name="eligibility_date"
                                           placeholder="Enter Eligibility Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Exam Date Confirmed</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           value="{{$progressflow->exam_date_confirmed}}" name="exam_date_confirmed"
                                           placeholder="Enter Exam Date Confirmed">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Send Confirmation To Candidate</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->send_confirmation_to_candidate}}" name="send_confirmation_to_candidate">
                                        <option value="" selected disabled>select</option>
                                        <option @if($progressflow->send_confirmation_to_candidate=='Email') selected @endif value="Email">Email</option>
                                        <option @if($progressflow->send_confirmation_to_candidate=='SMS') selected @endif value="SMS">SMS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Exam Result</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->exam_result}}" name="exam_result">
                                        <option value="" selected disabled>select</option>
                                        <option @if($progressflow->exam_result=='Not Given') selected @endif value="Not Given">Not Given</option>
                                        <option @if($progressflow->exam_result=='Pass') selected @endif value="Pass">Pass</option>
                                        <option @if($progressflow->exam_result=='Fail') selected @endif value="Fail">Fail</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Data Flow Report</p>
                                    <select class="form-control form select2"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            value="{{$progressflow->data_flow_report}}" name="data_flow_report">
                                        <option value="" selected disabled>select</option>
                                        <option @if($progressflow->data_flow_report=='Completed') selected @endif value="Completed">Completed</option>
                                        <option @if($progressflow->data_flow_report=='Pending') selected @endif value="Pending">Pending</option>
                                        <option @if($progressflow->data_flow_report=='More Document Required') selected @endif value="More Document Required">More Document Required</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Remarks</p>
                                    <textarea rows="5" class="form-control form"
                                              style="width:80%;margin-top: -20px;"
                                              name="remarks">
                                        {{$progressflow->remarks}}
                                    </textarea>
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