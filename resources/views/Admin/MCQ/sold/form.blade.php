@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">{{isset($soldmcq) ? 'Edit Sold MCQ' : "Add Sold MCQ"}}</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('MCQ.index')}}">View List of Sold MCq</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">{{isset($soldmcq) ? 'Edit Sold MCQ' : "Add Sold MCQ"}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card" style="padding:30px 0">
                    @if(isset($soldmcq))
                         <form action="" method="post" enctype="multipart/form-data">

                    @else
                         <form action="{{route('soldMCQ.store')}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label">Select MCQ</label>
                                @error('bookId')
                                        <small class="red block">{{$message}}</small>
                                @enderror
                                <select class="form-control mcqss" name="mcqId" id="mcqss">
                                    <option value="" selected>Select one ...</option>
                                    @foreach($data['mcqs'] as $mcq)
                                    <option value='{{$mcq->id}}' @if(isset($soldmcq)) @if($mcq->id==$soldmcq->mcqId) selected @endif @endif>{{$mcq->title}}</option>
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
                                <input type="number" id="price" name="totalAmount" class="form-control" placeholder="Price" value="{{@$soldmcq->totalAmount ?? old('totalAmount')}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Sold Date</label>
                                <input type="date" name="date" class="form-control" value="{{@$soldmcq->date ?? old('date')}}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">{{isset($soldmcq) ? 'Edit Sold Book' : "Add Sold MCQ"}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
@push('scripts')
<script type="text/javascript">
    $('.mcqss').on('change',function(){
        let id=$(this).val();

        $.ajax({
            type:'post',
            url:'{{route("sold.getMcqPrice")}}',
            data:{id:id,_token:"{{csrf_token(0)}}"},
            dataType:'json',
            success:function(data) {
                $('#price').val(data);
            }

        });
    });
</script>
@endpush
