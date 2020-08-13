@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant Education List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Education View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Education Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('Education.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>APPLICANTS NAME</th>
                                            <th>AUTHORITY NAME</th>
                                            <th>AUTHORITY ADDRESS</th>
                                            <th>AUTHORITY CITY</th>
                                            <th>AUTHORITY STATE</th>
                                            <th>AUTHORITY COUNTRY</th>
                                            <th>AUTHORITY PHONE TYPE</th>
                                            <th>AUTHORITY COUNTRY CODE</th>
                                            <th>AUTHORITY PHONE</th>
                                            <th>AUTHORITY EMAIL</th>
                                            <th>AUTHORITY WEBSITE</th>
                                            <th>QUALIFICATION</th>
                                            <th>INSTITUTION</th>
                                            <th>MODE</th>
                                            <th>MAJOR SUBJECT</th>
                                            <th>MINOR SUBJECT</th>
                                            <th>ROLL</th>
                                            <th>STUDY FROM</th>
                                            <th>STUDY TO</th>
                                            <th>CONFERRED DATE</th>
                                            <th>DEGREE ISSUE DATE</th>
                                            <th>EXPECTED DEGREE ISSUE DATE</th>
                                            <th>QUALIFICATION CERTIFICATE</th>
                                            <th>Character CERTIFICATE</th>
                                            <th>MARKSHEET</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($education as $education)
                                            <tr>
                                                <td><a href="{{route('ApplicantDetail',$education->applicant_id)}}">{{$education->Applicant_Education->first_name}} {{$education->Applicant_Education->middel_name}} {{$education->Applicant_Education->surname}}</a></td>
                                                <td>{{$education->authority_name}}</td>
                                                <td>{{$education->authority_address}}</td>
                                                <td>{{$education->authority_city}}</td>
                                                <td>{{$education->authority_state}}</td>
                                                <td>{{$education->authority_country}}</td>
                                                <td>{{$education->authority_phone_type}}</td>
                                                <td>{{$education->authority_country_code}}</td>
                                                <td>{{$education->authority_phone}}</td>
                                                <td>{{$education->authority_email}}</td>
                                                <td>{{$education->authority_website}}</td>
                                                <td>{{$education->qualification}}</td>
                                                <td>{{$education->institution}}</td>
                                                <td>{{$education->mode}}</td>
                                                <td>{{$education->major_subject}}</td>
                                                <td>{{$education->minor_subject}}</td>
                                                <td>{{$education->roll}}</td>
                                                <td>{{$education->study_from}}</td>
                                                <td>{{$education->study_to}}</td>
                                                <td>{{$education->conferred_date}}</td>
                                                <td>{{$education->degree_issue_date}}</td>
                                                <td>{{$education->expected_degree_issue_date}}</td>
                                                @if($education->qualification_certificate)
                                                <td><a target="_blank"
                                                       href="{{asset('/upload/Applicant/Education/'.$education->qualification_certificate)}}">Qualification
                                                        Certificate</a></td>

                                                @else
                                                    <td>No Qualification Certificate Found</td>
                                                @endif
                                                @if($education->character_certificate)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Applicant/Education/'.$education->character_certificate)}}">Character
                                                            Certificate</a></td>

                                                @else
                                                    <td>No Character Certificate Found</td>
                                                @endif
                                                @if($education->marksheet)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Applicant/Education/'.$education->marksheet)}}">MarkSheet</a>
                                                    </td>
                                                @else
                                                    <td>No Marksheet Found</td>
                                                @endif
                                                <td class="text-left">
                                                    <form action="{{ route('Education.edit', $education->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('Education.destroy', $education->id)}}"
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