@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View Admin List</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Admin View</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Admin Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('Admin.create')}}" class="btn btn-success fa fa-plus">Add
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
                                            <th>Role</th>
                                            <th>EMAIL</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($admin as $admin)
                                            <tr>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->role}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td class="text-left">
                                                    <form action="{{ route('Admin.edit', $admin->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('Admin.destroy', $admin->id)}}"
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