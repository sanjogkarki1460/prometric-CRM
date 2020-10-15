@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">{{isset($book) ? 'Edit Book' : "Add Book"}}</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('book.index')}}">View List of Book</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">{{isset($book) ? 'Edit Book' : "Add Book"}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding:30px 0">
                    @if(isset($book))
                         <form action="{{route('book.update',$book->id)}}" method="post" enctype="multipart/form-data">

                    @else
                         <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="container">
                            <div class='form-group'>
                                <label class="control-label">Book Name *</label>
                                @error('bookname')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <input type="text" name="bookname" class="form-control" placeholder="Book Name" value="{{@$book->bookname ?? old('bookname')}}">
                            </div>
                             <div class='form-group'>
                                <label class="control-label">Quantity *</label>
                                @error('qty')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <input min='0' type="number" name="qty" class="form-control" placeholder="Quantity" value="{{@$book->qty ?? old('qty')}}">
                            </div>
                            <div class='form-group'>
                                <label class="control-label">Price *</label>
                                @error('price')
                                        <small class="red block">{{$message}}</small>
                                 @enderror
                                <input min='0' type="number" name="price" class="form-control" placeholder="Price" value="{{@$book->price ?? old('price')}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">{{isset($book) ? 'Edit' : "Add"}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection