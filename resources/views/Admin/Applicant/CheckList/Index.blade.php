@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('Applicant.index')}}">Applicant View</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Checklist</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Check list</header>
                                <div class="cards pull-right">
                                    <a href="{{route('Applicant.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th style="font-size:10px;">APPLICANT</th>
                                            <th style="font-size:10px;">PASSWORD CITIZENSHIP CERTIFICATE</th>
                                            <th style="font-size:10px;">SLC_CERTIFICATE</th>
                                            <th style="font-size:10px;">+2/ISC/PCL CERTIFICATE</th>
                                            <th style="font-size:10px;">DIPLOMA DEGREECERTIFICATE</th>
                                            <th style="font-size:10px;">MARK SHEET OF EACH YEAR FINAL TRANSCRIPT</th>
                                            <th style="font-size:10px;">EQUIVALENT CERTIFICATE</th>
                                            <th style="font-size:10px;">COUNCIL REGISTRATION CERTIFICATE</th>
                                            <th style="font-size:10px;">COUNCIL REGISTRATION CERTIFICATE_RENEW</th>
                                            <th style="font-size:10px;">GOOD STANDING_LETTER FROM_COUNCIL</th>
                                            <th style="font-size:10px;">WORK EXPERIENCE LETTER TILL_DATE</th>
                                            <th style="font-size:10px;">BASIC LIFE SUPPORT FOR NURSES</th>
                                            <th style="font-size:10px;">MRP SIZE PHOTO IN WHITE BACKGROUND</th>
                                            <th style="font-size:10px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

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