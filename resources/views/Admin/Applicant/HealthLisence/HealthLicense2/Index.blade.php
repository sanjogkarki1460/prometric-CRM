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
                                    <a href="{{route('HealthLicense2.create')}}" class="btn btn-success fa fa-plus">Add
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
                                            <th>LICENSE NUMBER	</th>
                                            <th>LICENSE STATUS</th>
                                            <th>LICENSE ATTAINED</th>
                                            <th>LICENSE COPY</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($healthlicense  as $healthlicense  )
                                            <tr>
                                                <td>{{$healthlicense->id}}</td>
                                                <td><a href="{{route('ApplicantDetail',$healthlicense->applicant_id)}}">{{$healthlicense->Applicant_Health2->first_name}} {{$healthlicense->Applicant_Health2->middel_name}} {{$healthlicense->Applicant_Health2->surname}}</a></td>
                                                <td>{{$healthlicense->professional_designation}}</td>
                                                <td>{{$healthlicense->issuing_authority_name}}</td>
                                                <td>{{$healthlicense->issuing_authority_country}}</td>
                                                <td>{{$healthlicense->issuing_authority_city}}</td>
                                                <td>{{$healthlicense->license_conferred_date}}</td>
                                                <td>{{$healthlicense->license_expiry_date}}</td>
                                                <td>{{$healthlicense->license_type}}</td>
                                                <td>{{$healthlicense->license_number}}</td>
                                                <td>{{$healthlicense->license_status}}</td>
                                                <td>{{$healthlicense->license_attained}}</td>
                                                @if(!$healthlicense->license_copy)
                                                    <td>No License Copy</td>
                                                @else
                                                    <td><a target="_blank " href="{{asset('/upload/Applicant/Health License/'.$healthlicense->license_copy)}}">Lisence Copy</a></td>
                                                @endif
                                                <td class="text-left">
                                                    <form action="{{ route('HealthLicense2.edit', $healthlicense ->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form  action="{{ route('HealthLicense2.destroy', $healthlicense ->id)}}"
                                                           method="post" style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit" >Delete
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