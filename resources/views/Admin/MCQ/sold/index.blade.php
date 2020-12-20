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
                            <div class="page-title">List of Sold MCQ</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">List of Sold MCQ</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Sold MCQ Detail</header>
                                <div class="cards pull-right">
                                    <a href="{{route('soldMCQ.create')}}" class="btn btn-success fa fa-plus">Add Sold MCQ</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Sets Title</th>
                                            <th>Sold Date</th>
                                            <th>Total Price</th>

                                           <!--  <th>Action</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($soldmcqs as $key=>$sold)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$sold->enquiry->first_name}} {{$sold->enquiry->middle_name}} {{$sold->enquiry->last_name}}</td>
                                                     <td>{{$sold->mcq->title}}</td>
                                                     <td>{{date('F d,D Y', strtotime($sold->date))}}</td>
                                                     <td>Rs.{{$sold->totalAmount}}</td>
                                                    <!-- <td><a href="{{route('soldbook.edit',$sold->id)}}" class="btn btn-primary">Edit</a></td> -->
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