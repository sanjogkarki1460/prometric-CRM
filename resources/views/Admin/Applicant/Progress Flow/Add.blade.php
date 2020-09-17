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
                    <form action="{{route('ProgressFlow.store')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Applicant*</p>
                                    <select class="form-control form select2" id="applicant"
                                            style="height:34px;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled>select Appliant</option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Select Profession</p>
                                    <select class="form-control form select2" id="profession"
                                            style="height:34px;width:80%;margin-top: -20px;" name="profession">
                                        <option value="" selected disabled>select Profession</option>
                                        <option value="Registered Nurse" data-select2-id="3">Registered Nurse</option>
                                        <option value="Assistant Nurse">Assistant Nurse</option>
                                        <option value="MBBS Doctor">MBBS Doctor</option>
                                        <option value="BBS Doctor">BBS Doctor</option>
                                        <option value="Specialist Doctor">Specialist Doctor</option>
                                        <option value="Allied Health">Allied Health</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Email</p>
                                    <input type="email" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="email"
                                           placeholder="Enter  Email">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Contact Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="contact_number"
                                           placeholder="Enter Contact Number">
                                    </input>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Date of Birth</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="date_of_birth">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Passport Number</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="passport_number"
                                           placeholder="Enter Passport Number">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Signed By Applicant</p>
                                    <select class="form-control form select2" id="signed_by_applicant"
                                            style="height:34px;width:80%;margin-top: -20px;" name="signed_by_applicant">
                                        <option value="" selected disabled>select Profession</option>
                                        <option value="Yes" data-select2-id="3">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Signed Document</p>
                                    <input type="file" class="form-control form"
                                           style="height:27px;width:80%;margin-top: -20px;" name="signed_docs"
                                           >
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Service Charge</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="service_charge"
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
                                           style="height:34px;width:80%;margin-top: -20px;" name="service_paid_date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Mode Of Payment</p>
                                    <select class="form-control form select2" id="mode_of_payment"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="service_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Deposite">Bank Deposite</option>
                                        <option value="E-Sewa">E-Sewa</option>
                                        <option value="IME">IME</option>
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
                                           name="service_charge_received_by"
                                           placeholder="Enter Received By">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Fee</p>
                                    <input type="number" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="dhamcq_fee"
                                           placeholder="Enter DHAMCQ Fee">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">DHAMCQ Mode of Payment</p>
                                    <select class="form-control form select2" id="DHA_mode_of_payment"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="dhamcq_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Deposite">Bank Deposite</option>
                                        <option value="E-Sewa">E-Sewa</option>
                                        <option value="IME">IME</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">DHAMCQ Subject</p>
                                    <input type="text" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;" name="dhamcq_subject"
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
                                           style="height:34px;width:80%;margin-top: -20px;" name="dhamcq_username"
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
                                           style="height:34px;width:80%;margin-top: -20px;" name="dhamcq_password"
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
                                           style="height:34px;width:80%;margin-top: -20px;" name="dhamcq_email_sent"
                                           placeholder="Enter DHAMCQ Email Sent">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">BLS Training Completed Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="bls_training_completed_date"
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
                                           name="good_standing_certificate_issue_date"
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
                                    <select class="form-control form select2" id="equivalent_certificate"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="equivalent_certificate">
                                        <option value="" selected disabled>select Profession</option>
                                        <option value="Yes" data-select2-id="3">Yes</option>
                                        <option value="No">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">
                                        Books Provided</p>
                                    <select class="form-control form select2" id="book_provided"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="books_provided">
                                        <option value="" selected disabled>select Profession</option>
                                        <option value="Yes" data-select2-id="3">Yes</option>
                                        <option value="No">No</option>

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
                                           name="dha_email_account"
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
                                           name="dha_unique_id"
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
                                           name="dha_username"
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
                                           name="dha_password"
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
                                           name="dha_application_ref_number"
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
                                           name="dha_fees_first_installment"
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
                                           name="first_installment_paid_date"
                                           placeholder="Enter Paid Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Mode Of Payment</p>
                                    <select class="form-control form select2" id="DHA_first_mode_of_payment"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="first_installment_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Deposite">Bank Deposite</option>
                                        <option value="E-Sewa">E-Sewa</option>
                                        <option value="IME">IME</option>
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
                                           name="first_installment_received_by"
                                           placeholder="Enter Received By">
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
                                           name="dha_fees_second_installment"
                                           placeholder="Enter DHA Fees Second Installment">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Second Installment Paid Date</p>
                                    <input type="date" class="form-control form"
                                           style="height:34px;width:80%;margin-top: -20px;"
                                           name="second_installment_paid_date"
                                           placeholder="Enter Second Installment Paid Date">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Second Installment Mode Of Payment</p>
                                    <select class="form-control form select2" id="DHA_second_mode_of_payment"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="second_installment_mode_of_payment">
                                        <option value="" disabled selected>select</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Bank Deposite">Bank Deposite</option>
                                        <option value="E-Sewa">E-Sewa</option>
                                        <option value="IME">IME</option>
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
                                           name="second_installment_received_by"
                                           placeholder="Enter Second installment Received By">
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
                                           name="dataflow_email"
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
                                           name="dataflow_username"
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
                                           name="dataflow_password"
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
                                           name="dataflow_ref_no"
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
                                           name="dha_exam_eligibility_id"
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
                                           name="eligibility_date"
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
                                           name="exam_date_confirmed"
                                           placeholder="Enter Exam Date Confirmed">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Send Confirmation To Candidate</p>
                                    <select class="form-control form select2" id="confirmation"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="send_confirmation_to_candidate">
                                        <option value="" selected disabled>select</option>
                                        <option value="Email">Email</option>
                                        <option value="SMS">SMS</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Exam Result</p>
                                    <select class="form-control form select2" id="result"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="exam_result">
                                        <option value="" selected disabled>select</option>
                                        <option value="Not Given">Not Given</option>
                                        <option value="Pass">Pass</option>
                                        <option value="Fail">Fail</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 2px;">Data Flow Report</p>
                                    <select class="form-control form select2" id="data_flow"
                                            style="height:34px;width:80%;margin-top: -20px;"
                                            name="data_flow_report">
                                        <option value="" selected disabled>select</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Pending">Pending</option>
                                        <option value="More Document Required">More Document Required</option>
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
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#applicant').select2({
                        placeholder: "Select a Applicant"
                    });
                    $('#profession').select2({
                        placeholder: "Select profession"
                    });
                    $('#signed_by_applicant').select2({
                        placeholder: "Select a Signed By Applicant"
                    });
                    $('#mode_of_payment').select2({
                        placeholder: "Select a Mode of Payment"
                    });
                    $('#DHA_mode_of_payment').select2({
                        placeholder: "Select a Mode of Payment"
                    });
                    $('#equivalent_certificate').select2({
                        placeholder: "Select a Equivalent Certificate"
                    });
                    $('#book_provided').select2({
                        placeholder: "Select One"
                    });
                    $('#DHA_first_mode_of_payment').select2({
                        placeholder: "Select a Mode of Payment"
                    });
                    $('#DHA_second_mode_of_payment').select2({
                        placeholder: "Select a Mode of Payment"
                    });
                    $('#confirmation').select2({
                        placeholder: "Select a Confrimation Mode"
                    });
                    $('#result').select2({
                        placeholder: "Select a Result"
                    });
                    $('#data_flow').select2({
                        placeholder: "Select a Data Flow Report"
                    });
                });
            </script>
@endsection