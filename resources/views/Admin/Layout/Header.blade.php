@section('header')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <div class="page-wrapper" style="margin-top: -40px;">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner ">
                <!-- logo start -->
                <div class="page-logo">
                    <a href="{{route('admin.home')}}">
                        <span class="logo-icon material-icons fa-rotate-45">school</span>
                        <span class="logo-default">Visa</span> </a>
                </div>
                <!-- logo end -->
                {{--<ul class="nav navbar-nav navbar-left in">--}}
                {{--<li><a  class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>--}}
                {{--</ul>--}}
                <form class="search-form-opened" action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
							<a href="javascript:;" class="btn submit">
								<i class="icon-magnifier"></i>
							</a>
						</span>
                    </div>
                </form>

                <!-- start mobile menu -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                   data-target=".navbar-collapse">
                    <span></span>
                </a>
                <!-- end mobile menu -->
                <!-- start header menu -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <i class="fa fa-bell-o"></i>
                                {{--<span class="badge headerBadgeColor1"> {{auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count()}} </span>--}}
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        {{--@foreach(auth()->user()->notifications as $notification )--}}
                                            {{--<li>--}}
                                                {{--<a @if ($notification->type=='App\Notifications\ApplicantNotification') href="{{route('ApplicantRead')}} @else href="{{route('EnquiryRead')}} @endif--}}
                                                {{--">--}}
                                                {{--@if($notification->read_at==null)--}}
                                                    {{--<span class="time">Unread</span>--}}
                                                {{--@endif--}}
                                                {{--<span class="details">--}}
													{{--<span class="notification-icon circle deepPink-bgcolor"><i--}}
                                                                {{--class="fa fa-check"></i></span>--}}
                                                    {{--{{$notification->data[1]}} </span>--}}
                                                {{--</a>--}}
                                            {{--</li>--}}
                                        {{--@endforeach--}}
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:;" class="fullscreen-btn"><i class="fa fa-arrows-alt"></i></a></li>
                        <!-- start manage user dropdown -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <img alt="" class="img-circle " src=""/>
                                <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{route('logout')}}">
                                        <i class="icon-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

@endsection