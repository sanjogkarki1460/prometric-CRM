@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Dashboard</div>
                        </div>
                    </div>
                </div>
                <div class="state-overview">
                    <div class="row">
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-green">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">group</i></span>
                                <div class="info-box-content">
                                    <span>Total Applicant:</span>
                                    <span class="info-box-number">{{$applicant}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">group</i></span>
                                <div class="info-box-content">
                                    <span>Total Applicant This Month:</span>
                                    <span class="info-box-number">{{$applicantthismonth}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-blue">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total Enquiry:</span>
                                    <span class="info-box-number">{{$enquiry}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-info">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total Enquiry This Month:</span>
                                    <span class="info-box-number">{{$enquirythismonth}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-yellow">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content ">
                                    <span>Total SMS TO Applicant:</span>
                                    <span class="info-box-number">{{$applicantSMS}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6  col-md-6 col-6">
                            <div class="info-box bg-b-pink">
                                <span class="info-box-icon push-bottom mt-0"><i class="material-icons">person</i></span>
                                <div class="info-box-content">
                                    <span>Total SMS TO Enquiry:</span>
                                    <span class="info-box-number">{{$enquirySMS}}</span>
                                    <div class="">
                                        <div class="progress-bar"></div>
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