@extends('Admin.Layout.master')
@section('main_content')
<style type="text/css">
    .red
    {
        color:red;
        background:none;
    }
    .green
    {
        color:green;
        background:none;
    }
</style>
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">List of MCQ</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">List of MCQ</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>MCQ Detail</header>
                                <div class="cards pull-right">
                                    <a href="{{route('MCQ.create')}}" class="btn btn-success fa fa-plus">Add MCQ</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Title</th>
                                            <th>No of Sets</th>
                                            <th>Per Price</th>
                                            <th>Status</th>
                                           <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mcqs as $key=>$mcq)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$mcq->title}} </td>
                                                     <td>{{$mcq->noofsets}}</td>
                                                     <td>Rs.{{$mcq->price}}</td>
                                                     <td>@if($mcq->status==1) <span class="green">In Stock</span>@else <span class="red">Out of Stock</span>@endif</td>
                                                    <td><a href="{{route('MCQ.edit',$mcq->id)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;<a class="btn btn-danger" href="{{route('MCQ.delete',$mcq->id)}}">Delete</a></td>
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