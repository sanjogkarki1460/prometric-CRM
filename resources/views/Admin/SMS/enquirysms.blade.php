@extends('Admin.Layout.master')
@section('main_content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkbox').click(function () {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function () {
                    this.checked = checked;
                });
            })
        });
    </script>
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Send SMS</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>

                                <li class="active">Send SMS</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('SendSMS')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_type" value="Enquiry">
                        <label for="" class="ah1">
                            Enter Message
                        </label>
                        <div>
                            <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-head">
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="table-scrollable">
                                            <table id="example1" class="display" style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkbox" name="checkbox"></th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($enquiry as $enquiry)
                                                <tr>
                                                    <td><input type="checkbox" id="phonenumbers"
                                                               value="{{ $enquiry->phone }}"
                                                               name="phone_number[]">
                                                    </td>
                                                    <td>{{$enquiry->id}}</td>
                                                    <td>{{$enquiry->first_name}} {{$enquiry->middle_name}} {{$enquiry->last_name}}</td>
                                                    <td>{{$enquiry->email}}</td>
                                                    <td>{{$enquiry->phone}}</td>

                                                </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


@endsection
