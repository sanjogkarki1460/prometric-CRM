@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">{{isset($mcq) ? 'Edit MCQ' : "Add MCQ"}}</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('book.index')}}">View List of MCQ</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">{{isset($mcq) ? 'Edit MCQ' : "Add MCQs"}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding:30px 0">
                    @if(isset($mcq))
                         <form action="{{route('MCQ.update',$mcq->id)}}" method="post" enctype="multipart/form-data">

                    @else
                         <form action="{{route('MCQ.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" value="{{@$mcq->title ?? old('title')}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No of sets</label>
                                <input type="number" value="{{@$mcq->noofsets ?? old('noofsets')}}" name="noofsets" class="form-control" placeholder="No of sets">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="number" value="{{@$mcq->price ?? old('price')}}" name="price" class="form-control" placeholder="Price">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Available</label>
                                <input type="checkbox" name="status" value="1" @if(isset($mcq)) {{$mcq->status==1 ? 'checked' : ''}} @endif>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">{{isset($mcq) ? 'Edit' : 'Add'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection