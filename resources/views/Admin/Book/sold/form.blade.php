@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">{{isset($soldbook) ? 'Edit Sold Book' : "Add Sold Book"}}</div>
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
                                <li class="active">{{isset($soldbook) ? 'Edit Sold Book' : "Add Sold Book"}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding:30px 0">
                    @if(isset($soldbook))
                         <form action="" method="post" enctype="multipart/form-data">

                    @else
                         <form action="{{route('soldbook.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Select Book</label>
                                @error('bookId')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <select class="form-control bookss" name="bookId" id="bookss">
                                    <option value="" selected>Select one ...</option>
                                    @foreach($data['book'] as $book)
                                    <option value='{{$book->id}}' @if(isset($soldbook)) @if($book->id==$soldbook->bookId) selected @endif @endif>{{$book->bookname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Name of Person</label>
                                @error('enquiryId')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <select class="form-control" name="enquiryId" id="person">
                                    <option value='' selected>Select One...</option>
                                    @foreach($data['enquiries'] as $enquiry)
                                    <option value="{{$enquiry->id}}"  @if(isset($soldbook)) @if($enquiry->id==$soldbook->enquiryId) selected @endif @endif>{{$enquiry->first_name}} {{$enquiry->middle_name}} {{$enquiry->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Total Price</label>
                                @error('totalAmount')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <input type="number" id="price" name="totalAmount" class="form-control" placeholder="Price" value="{{@$soldbook->totalAmount ?? old('totalAmount')}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">{{isset($soldbook) ? 'Edit Sold Book' : "Add Sold Book"}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('.bookss').on('change',function(){
        let id=$(this).val();

        $.ajax({
            type:'post',
            url:'{{url("admin/book/getbookprice")}}',
            data:{id:id,_token:"{{csrf_token(0)}}"},
            dataType:'json',
            success:function(data) {
                $('#price').val(data);
            }

        });
    });
</script>
@endpush
