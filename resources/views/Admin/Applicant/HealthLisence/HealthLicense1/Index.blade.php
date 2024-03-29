@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Applicant Health License List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Applicant Health License View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Health License Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('HealthLicense.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>APPLICANTS NAME</th>
                                            <th>PRO. DESIGNATION</th>
                                            <th>ISSUING AUTHORITY Name</th>
                                            <th>ISSUING AUTH. COUNTRY</th>
                                            <th>ISSUING AUTH. City</th>
                                            <th>LICENSE CONFERRED</th>
                                            <th>LICENSE EXPIRY DATE</th>
                                            <th>LICENSE TYPE</th>
                                            <th>LICENSE NUMBER</th>
                                            <th>LICENSE STATUS</th>
                                            <th>LICENSE ATTAINED</th>
                                            <th>LICENSE COPY</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($healthlisence  as $healthlisence  )
                                            <tr>
                                                <td>{{$healthlisence->id}}</td>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$healthlisence->applicant_id)}}">{{$healthlisence->Applicant_Health->first_name}} {{$healthlisence->Applicant_Health->middle_name}} {{$healthlisence->Applicant_Health->last_name}}</a>
                                                </td>
                                                <td>{{$healthlisence->professional_designation}}</td>
                                                <td>{{$healthlisence->issuing_authority_name}}</td>
                                                <td>{{$healthlisence->issuing_authority_country}}</td>
                                                <td>{{$healthlisence->issuing_authority_city}}</td>
                                                <td>{{$healthlisence->license_conferred_date}}</td>
                                                <td>{{$healthlisence->license_expiry_date}}</td>
                                                <td>{{$healthlisence->license_type}}</td>
                                                <td>{{$healthlisence->license_number}}</td>
                                                <td>{{$healthlisence->license_status}}</td>
                                                <td>{{$healthlisence->license_attained}}</td>
                                                @if(!$healthlisence->license_copy)
                                                    <td>No License Copy</td>
                                                @else
                                                    <td><a target="_blank "
                                                           href="{{asset('/upload/Health License/'.$healthlisence->license_copy)}}">Lisence
                                                            Copy</a></td>
                                                @endif
                                                @if(Auth::user()->role=='Admin')
                                                    <td class="text-left">
                                                        <div>
                                                            <form action="{{ route('HealthLicense.edit', $healthlisence ->id)}}"
                                                                  method="GET"
                                                                  style="display: inline-block">
                                                                {{csrf_field()}}
                                                                {{method_field('PUT')}}
                                                                <button class="btn btn-primary btn-sm" type="submit">Edit
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="mt-1">
                                                            <form action="{{ route('HealthLicense.destroy', $healthlisence ->id)}}"
                                                                  method="post" style="display: inline-block">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button class="btn btn-danger btn-sm" type="submit">Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="mt-1">
                                                            <form action="{{ route('ApplicantDetail', $healthlisence->id)}}" style="display: inline-block">
                                                                <button class="btn btn-success btn-sm" type="submit">View
                                                                </button>
                                                            </form>
                                                        </div>
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