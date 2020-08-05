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
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="{{route('Applicant.index')}}">Applicant
                                    View</a>&nbsp;<i
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
                                    <a href="{{route('CheckList.create')}}" class="btn btn-success fa fa-plus">Add
                                        CheckList</a>
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
                                        @foreach($checklist as $checklist)
                                            <tr>
                                                <td>{{$checklist->Applicant_CheckList->first_name}} {{$checklist->Applicant_CheckList->middle_name}} {{$checklist->Applicant_CheckList->surname}}</td>
                                                @if($checklist->password_citizenship_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->slc_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->plus_two_isc_pcl_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->diploma_degree_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->mark_sheet_of_each_year_final_transcript=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->equivalent_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->council_registration_certificate=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->council_registration_certificate_renew=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->good_standing_letter_from_council=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->work_experience_letter_till_date=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->basic_life_support_for_nurses=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                @if($checklist->mrp_size_photo_in_white_background=='Yes')
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" checked="" disabled=""></div>
                                                    </td>
                                                @else()
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" disabled=""></div>
                                                    </td>
                                                @endif
                                                <td class="text-left">
                                                    <form action="{{ route('CheckList.edit', $checklist->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('CheckList.destroy', $checklist->id)}}"
                                                          method="post" style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete
                                                        </button>
                                                    </form>
                                                </td>
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