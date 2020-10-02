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
                                <div class="col-md-12">
                                    <form action="{{route('Applicant.index')}}" method="psot">
                                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row col-md-12">
                                            <div class="col-md-9">
                                                <header>Search By:</header>
                                                <select name="category" id=""
                                                        style="height: 40px;border-radius:120px;width: 120px;">
                                                    <option value="" disabled selected>By Profession</option>
                                                    @foreach($category as $category)
                                                        <option value="{{$category->id}}">{{$category->Name}}</option>
                                                    @endforeach
                                                </select>
                                                <select name="color_code" id=""
                                                        style="height: 40px;border-radius:120px;"
                                                        class="ml-3">
                                                    <option value="" disabled selected>By Color Code</option>
                                                    <option value="whitelist">White List</option>
                                                    <option value="redlist">Red List</option>
                                                    <option value="blacklist">Black List</option>
                                                    <option value="greenlist">Green List</option>
                                                </select>
                                                <select name="status" id="" style="height: 40px;border-radius:120px;"
                                                        class="ml-3">
                                                    <option value="" disabled selected>By Status</option>
                                                    <option value="New">New</option>
                                                    <option value="In Progress">In Progress</option>
                                                    <option value="Waiting for test">Waiting for test</option>
                                                    <option value="Wating for result">Wating for result</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                                <a href="{{route('Applicant.index')}}"
                                                   class="btn btn-danger ml-1">Reset</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Passport Docs</th>
                                            <th>Applicant's Profession</th>
                                            <th>Applicant's Status</th>
                                            <th>Color Code</th>
                                            @if(Auth::user()->role=='Admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applicant as $applicant)
                                            <tr>
                                                <td>{{$applicant->id}}</td>
                                                <td>
                                                    <a href="{{route('ApplicantDetail',$applicant->id)}}">{{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}}</a>
                                                </td>
                                                <td>{{$applicant->phone}}</td>
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
                                                <td class="text-capitalize">
                                                    <div type="button"
                                                         id="dropdownMenu2" data-toggle="dropdown"
                                                         aria-haspopup="true" aria-expanded="false">
                                                        @if($applicant->color_code=='whitelist')
                                                            <p class="text-center">white</p>
                                                        @elseif($applicant->color_code=='redlist')
                                                            <p class="btn-danger btn-circle text-center">Red</p>
                                                        @elseif($applicant->color_code=='blacklist')
                                                            <p class="btn-dark btn-circle text-center">Black</p>
                                                        @elseif($applicant->color_code=='greenlist')
                                                            <p class="btn-success btn-circle text-center">Green</p>
                                                        @else
                                                            <p class="btn-default btn-circle text-center">None</p>
                                                        @endif
                                                    </div>
                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
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
                                                        </li>
                                                        <li>
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
                                                        </li>
                                                        <li>
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
                                                        </li>
                                                        <li>
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
                                                        </li>
                                                    </ul>
                                                </td>
                                                @if(Auth::user()->role=='Admin')
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-info dropdown-toggle" type="button"
                                                                    id="dropdownMenu2" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu bg-secondary"
                                                                 aria-labelledby="dropdownMenu2">
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
                                                                <div class="text-center bg-white ">
                                                                    <form action="{{ route('ApplicantSMS')}}"
                                                                          method="post"
                                                                          style="display: inline-block">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$applicant->id}}">
                                                                        <button class=" btn text-success"
                                                                                style="width: 180px;"
                                                                                type="submit"> Send SMS
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="text-center bg-white ">
                                                                    <form action="{{ route('ApplicantMail')}}"
                                                                          method="post"
                                                                          style="display: inline-block">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{$applicant->id}}">
                                                                        <button class=" btn text-default "
                                                                                style="width: 180px;"
                                                                                type="submit"> Send Email
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
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