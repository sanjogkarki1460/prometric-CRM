@section('header')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{Session::flash('Error',$error)}}
        @endforeach
    @endif
    <div class="page-wrapper" style="margin-top: -40px;" id="app">
        <!-- start header -->
        <div class="page-header navbar navbar-fixed-top">
            <div class=" page-header-inner ">

                <div class=" page-logo" style="background-color: white">
                    <a href="{{route('admin.home')}}">
                        <span class="logo-default"><img style="margin-top:-15px;margin-left:10px;height:65px;"src="{{asset('assets/img/pen.png')}}" alt=""></span> </a>
                </div>
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
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                   data-target=".navbar-collapse">
                    <span></span>
                </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">
                                <i class="fa fa-bell-o"><span
                                            class="badge">{{count(auth()->user()->unreadNotifications)}}</span></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3><span class="bold">Notifications</span></h3>
                                </li>
                                <li>
                                    <ul class="dropdown-menu-list small-slimscroll-style" data-handle-color="#637283">
                                        @foreach(auth()->user()->unreadNotifications as $notification )
                                            <li>
                                                <a @if ($notification->type=='App\Notifications\ApplicantNotification') href="{{route('Applicantmarkasread')}} @elseif($notification->type=='App\Notifications\ApplicantUpdateNotification') href="{{route('Applicantmarkasread')}} @else href="{{route('Enquirymarkasread')}} @endif
                                                ">
                                                @if($notification->read_at==null)
                                                    <span class="time">Unread</span>
                                                @endif
                                                <span class="details">
													<span class="notification-icon circle deepPink-bgcolor"><i
                                                                class="fa fa-check"></i></span>
                                                    {{$notification->data['message']}} </span>
                                                </a>
                                            </li>
                                        @endforeach
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
                                    <a href="{{route('PasswordChangeView')}}">
                                        <i class="icon-key"></i> Change Password </a>
                                </li>
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