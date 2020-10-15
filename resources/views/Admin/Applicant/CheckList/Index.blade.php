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
                                            <th style="font-size:10px;">Applicant</th>
                                            <th style="font-size:10px;">MRP Size Photo Ib White Background</th>
                                            <th style="font-size:10px;">Passpory</th>
                                            <th style="font-size:10px;">Citizen</th>
                                            <th style="font-size:10px;">SLC Marksheet</th>
                                            <th style="font-size:10px;">SLC Certificate</th>
                                            <th style="font-size:10px;">SLC Character Certificate</th>
                                            <th style="font-size:10px;">+2 Transcript</th>
                                            <th style="font-size:10px;">+2 Certificate</th>
                                            <th style="font-size:10px;">+2 Character Certificate</th>
                                            <th style="font-size:10px;">PCL/Diploma Transcript</th>
                                            <th style="font-size:10px;">PCL/Diploma Certificate</th>
                                            <th style="font-size:10px;">PCL/Diploma Character Certificate</th>
                                            <th style="font-size:10px;">Bachelor Transcript</th>
                                            <th style="font-size:10px;">Bachelor Certificate</th>
                                            <th style="font-size:10px;">Bachelor Character Certificate</th>
                                            <th style="font-size:10px;">Master Transcript</th>
                                            <th style="font-size:10px;">Master Certificate</th>
                                            <th style="font-size:10px;">Master Character Certificate</th>
                                            <th style="font-size:10px;">Internship Completion Certificate</th>
                                            <th style="font-size:10px;">Equivalent Certificate</th>
                                            <th style="font-size:10px;">Council Registration Certificate Front</th>
                                            <th style="font-size:10px;">Council Registration Certificate Back</th>
                                            <th style="font-size:10px;">Council Good Standing Letter</th>
                                            <th style="font-size:10px;">Work Experience Letter1</th>
                                            <th style="font-size:10px;">Work Experience Letter2</th>
                                            <th style="font-size:10px;">Work Experience Letter3</th>
                                            <th style="font-size:10px;">Work Experience Letter4</th>
                                            <th style="font-size:10px;">Work Experience Letter5</th>
                                            <th style="font-size:10px;">Basic Life Support Certificate</th>
                                            <th style="font-size:10px;">Signed Letter Authorization</th>
                                            <th style="font-size:10px;">Signed Service Agreement</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th style="font-size:10px;">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($checklist as $checklist)
                                            <tr>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$checklist->applicant_id)}}">{{$checklist->Applicant_CheckList->first_name}} {{$checklist->Applicant_CheckList->middle_name}} {{$checklist->Applicant_CheckList->last_name}}</a>
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
                                                @if($checklist->bachelor_transcript=='Yes')
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
                                                @if($checklist->bachelor_certificate=='Yes')
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
                                                @if($checklist->bachelor_character_certificate=='Yes')
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
                                                @if($checklist->master_transcript=='Yes')
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
                                                @if($checklist->master_certificate=='Yes')
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
                                                @if($checklist->master_character_certificate=='Yes')
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
                                                @if($checklist->internship_completion_certificate=='Yes')
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
                                                @if($checklist->work_experience_letter4=='Yes')
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
                                                @if($checklist->work_experience_letter5=='Yes')
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
                                                        <form action="{{ route('ApplicantDetail', $checklist->id)}}" style="display: inline-block">
                                                            <button class="btn btn-success btn-sm" type="submit">View
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