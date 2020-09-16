@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Green List Applicant List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Green List Applicant View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Green List Applicant Detail Table</header>
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
                                            <th>EMAIL</th>
                                            <th>PASSPORT DOCS</th>
                                            <th>APPLICANT'S CATEGORY</th>
                                            <th>APPLICANT'S STATUS</th>
                                            <th>COLOR CODE</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applicant as $applicant)
                                            <tr>
                                                <td>{{$applicant->id}}</td>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$applicant->id)}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</a>
                                                </td>
                                                <td>{{$applicant->mobile_no}}</td>
                                                <td>{{$applicant->email}}</td>
                                                @if($applicant->passport_docs)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Applicant/'.$applicant->passport_docs)}}">Passport
                                                            Document</a></td>
                                                @else
                                                    <td>No Document File</td>
                                                @endif
                                                <td>{{@$applicant->Category_Applicant->Name}}</td>
                                                <td>{{@$applicant->status}}</td>
                                                <td class="text-capitalize">{{@$applicant->color_code}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-info dropdown-toggle" type="button"
                                                                id="dropdownMenu2" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu bg-secondary"
                                                             aria-labelledby="dropdownMenu2">
                                                            @if(Auth::user()->role=='Admin')
                                                                <div class="text-center bg-white ">
                                                                    <form action="{{ route('Applicant.edit',$applicant->id)}}"
                                                                          method="GET"
                                                                          style="display: inline-block">
                                                                        {{csrf_field()}}
                                                                        {{method_field('PUT')}}
                                                                        <button class=" btn text-primary "
                                                                                style="width: 180px;"
                                                                                type="submit"> Edit
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class=" text-center bg-white">
                                                                    <form action="{{ route('Applicant.destroy',$applicant->id)}}"
                                                                          method="post" style="display: inline-block">
                                                                        {{csrf_field()}}
                                                                        {{method_field('DELETE')}}
                                                                        <button class="btn text-danger"
                                                                                style="width: 180px;" type="submit">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            @endif
                                                            <div class=" text-center bg-white ">
                                                                <form action="{{ route('ApplicantColorUpdate',$applicant->id)}}"
                                                                      method="post"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    <input required type="hidden" name="_method"
                                                                           value="put">
                                                                    <input type="hidden" name="color_code"
                                                                           value="whitelist">
                                                                    <button class=" btn text-primary "
                                                                            style="width: 180px;"
                                                                            type="submit"> White List
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class=" text-center bg-white ">
                                                                <form action="{{ route('ApplicantColorUpdate',$applicant->id)}}"
                                                                      method="post"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    <input required type="hidden" name="_method"
                                                                           value="put">
                                                                    <input type="hidden" name="color_code"
                                                                           value="redlist">
                                                                    <button class=" btn text-danger "
                                                                            style="width: 180px;"
                                                                            type="submit"> Red List
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class=" text-center bg-white ">
                                                                <form action="{{ route('ApplicantColorUpdate',$applicant->id)}}"
                                                                      method="post"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    <input required type="hidden" name="_method"
                                                                           value="put">
                                                                    <input type="hidden" name="color_code"
                                                                           value="blacklist">
                                                                    <button class=" btn text-black "
                                                                            style="width: 180px;"
                                                                            type="submit"> Black List
                                                                    </button>
                                                                </form>
                                                            </div>
                                                            <div class=" text-center bg-white ">
                                                                <form action="{{ route('ApplicantColorUpdate',$applicant->id)}}"
                                                                      method="post"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    <input required type="hidden" name="_method"
                                                                           value="put">
                                                                    <input type="hidden" name="color_code"
                                                                           value="greenlist">
                                                                    <button class=" btn text-success "
                                                                            style="width: 180px;"
                                                                            type="submit"> Green List
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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