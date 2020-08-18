@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Change Password</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>

                                <li class="active">Change Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('PasswordChange',$user->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input required type="hidden" name="_method" value="put">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Old Password*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="password" name="old_password" placeholder="Enter Password">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Password*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="password" name="password" placeholder="Enter Password">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;">Confirm Password*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;margin-top:-15px;"
                                           type="password" name="confirm_password" placeholder="Enter confrim password">
                                </div>
                            </div>
                        </div>
                        <div class="submit" style="margin-top: 20px;margin-bottom: 30px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection