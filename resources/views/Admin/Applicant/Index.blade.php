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
                            <li class="active">Applicant View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Detail Table</header>
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
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>MOBILE NO</th>
                                            <th>NATIONALITY</th>
                                            <th>EMAIL</th>
                                            <th>PASSPORT DOCS</th>
                                            <th>APPLICANT'S CATEGORY</th>
                                            @if(Auth::user()->role=='Admin')
                                            <th>Action</th>
                                                @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applicant as $applicant)
                                            <tr>
                                                <td>{{$applicant->id}}</td>
                                                <td><a href="{{route('ApplicantDetail',$applicant->id)}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</a></td>
                                                <td>{{$applicant->mobile_no}}</td>
                                                <td>{{$applicant->nationality}}</td>
                                                <td>{{$applicant->email}}</td>
                                                @if($applicant->passport_docs)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Passport
                                                            Document</a></td>
                                                @else
                                                    <td>No Document File</td>
                                                @endif
                                                <td>{{@$applicant->Category_Applicant->Name}}</td>
                                                @if(Auth::user()->role=='Admin')
                                                <td class="text-left">
                                                    <form action="{{ route('Applicant.edit', $applicant->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('Applicant.destroy', $applicant->id)}}"
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