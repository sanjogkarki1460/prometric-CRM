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
                                            <th style="font-size:10px;">MRP SIZE PHOTO IN WHITE BACKGROUND</th>
                                            <th style="font-size:10px;">PASSPORT</th>
                                            <th style="font-size:10px;">CITIZEN</th>
                                            <th style="font-size:10px;">SLC MARKSHEET</th>
                                            <th style="font-size:10px;">SLC CERTIFICATE</th>
                                            <th style="font-size:10px;">SLC CHARACTER CERTIFICATE</th>
                                            <th style="font-size:10px;">+2 TRANSCRIPT</th>
                                            <th style="font-size:10px;">+2 CERTIFICATE</th>
                                            <th style="font-size:10px;">+2 CHARACTER CERTIFICATE</th>
                                            <th style="font-size:10px;">PCL/DIPLOMA TRANSCRIPT</th>
                                            <th style="font-size:10px;">PCL/DIPLOMA CERTIFICATE</th>
                                            <th style="font-size:10px;">PCL/DIPLOMA CHARACTER CERTIFICATE</th>
                                            <th style="font-size:10px;">EQUIVALENT CERTIFICATE</th>
                                            <th style="font-size:10px;">COUNCIL REGISTRATION CERTIFICATE FRONT</th>
                                            <th style="font-size:10px;">COUNCIL REGISTRATION CERTIFICATE BACK</th>
                                            <th style="font-size:10px;">COUNCIL GOOD STANDING LETTER</th>
                                            <th style="font-size:10px;">WORK EXPERIENCE LETTER1</th>
                                            <th style="font-size:10px;">WORK EXPERIENCE LETTER2</th>
                                            <th style="font-size:10px;">WORK EXPERIENCE LETTER3</th>
                                            <th style="font-size:10px;">BASIC LIFE SUPPORT CERTIFICATE</th>
                                            <th style="font-size:10px;">SIGNED LETTER AUTHORIZATION</th>
                                            <th style="font-size:10px;">SIGNED SERVICE AGREEMENT</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:10px;">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($checklist as $checklist)
                                            <tr>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$checklist->applicant_id)}}">{{$checklist->Applicant_CheckList->first_name}} {{$checklist->Applicant_CheckList->middel_name}} {{$checklist->Applicant_CheckList->surname}}</a>
                                                </td>
                                                @if($checklist->mrp_size_photo=='Yes')
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
                                                @if($checklist->passport=='Yes')
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
                                                @if($checklist->citizen=='Yes')
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
                                                @if($checklist->slc_marksheet=='Yes')
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
                                                @if($checklist->slc_character_certificate=='Yes')
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
                                                @if($checklist->plus2transcript=='Yes')
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
                                                @if($checklist->plus2certificate=='Yes')
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
                                                @if($checklist->plus2character_certificate=='Yes')
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



                                                @if($checklist->diploma_transcript=='Yes')
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
                                                @if($checklist->diploma_certificate=='Yes')
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
                                                @if($checklist->diploma_character_certificate=='Yes')
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
                                                @if($checklist->council_registration_certificate_front=='Yes')
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
                                                @if($checklist->council_registration_certificate_back=='Yes')
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
                                                @if($checklist->council_good_standing_letter=='Yes')
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
                                                @if($checklist->work_experience_letter1=='Yes')
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
                                                @if($checklist->work_experience_letter2=='Yes')
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
                                                @if($checklist->work_experience_letter3=='Yes')
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
                                                @if($checklist->basic_life_support_certificate=='Yes')
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
                                                @if($checklist->signed_letter_authorization=='Yes')
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
                                                @if($checklist->signed_service_agreement=='Yes')
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
                                                @if(Auth::user()->role=='Admin')
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