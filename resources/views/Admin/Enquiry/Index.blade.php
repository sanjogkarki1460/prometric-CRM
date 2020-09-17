@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Enquiry List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Enquiry View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <div class="col-md-12">
                                    <div class="col-md-11">
                                        <form action="{{route('Enquiry.index')}}" method="psot">
                                            <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row col-md-12">
                                                <div class="col-md-8">
                                                    <header>Search By:</header>
                                                    <select name="category" id="" style="height: 40px;border-radius:120px;width: 120px;">
                                                        <option value="" disabled selected>By Category</option>
                                                        @foreach($category as $category)
                                                            <option value="{{$category->id}}">{{$category->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <select name="color_code" id="" style="height: 40px;border-radius:120px;"
                                                            class="ml-3">
                                                        <option value="" disabled selected>By Color Code</option>
                                                        <option value="whitelist">White List</option>
                                                        <option value="redlist">Red List</option>
                                                        <option value="blacklist">Black List</option>
                                                        <option value="greenlist">Green List</option>
                                                    </select>
                                                    <select name="eligibility" id="" style="height: 40px;border-radius:120px;"
                                                            class="ml-3">
                                                        <option value="" disabled selected>By Eligibility</option>
                                                        <option value="Eligible">Eligible</option>
                                                        <option value="Noteligible">Not Eligible</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary mr-1">Search</button>
                                                    <a href="{{route('Enquiry.index')}}" class="btn btn-danger">Reset</a>
                                                    <a href="{{route('Enquiry.create')}}" class="btn btn-success fa fa-plus ml-1">Add New</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>NAME</th>
                                            <th>EmaiL</th>
                                            <th>Phone</th>
                                            <th>CATEGORY</th>
                                            <th>COLOR CODE</th>
                                            <th>Eligibility</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($enquiry as $enquiry)
                                            <tr>
                                                <td>{{$enquiry->id}}</td>
                                                <td>
                                                    <a href="{{route('EnquiryDetail',$enquiry->id)}}">{{$enquiry->first_name}} {{$enquiry->middle_name}} {{$enquiry->last_name}}</a>
                                                </td>
                                                <td>{{$enquiry->email}}</td>
                                                <td>{{$enquiry->phone}}</td>
                                                <td>{{@$enquiry->Category_Enquiry->Name}}</td>
                                                <td class="text-capitalize">{{@$enquiry->color_code}}</td>
                                                <td class="text-capitalize">{{@$enquiry->eligibility}}</td>
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
                                                                    <form action="{{ route('Enquiry.edit',$enquiry->id)}}"
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
                                                                    <form action="{{ route('Enquiry.destroy',$enquiry->id)}}"
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
                                                                <form action="{{ route('ColorUpdate',$enquiry->id)}}"
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
                                                                <form action="{{ route('ColorUpdate',$enquiry->id)}}"
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
                                                                <form action="{{ route('ColorUpdate',$enquiry->id)}}"
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
                                                                <form action="{{ route('ColorUpdate',$enquiry->id)}}"
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


