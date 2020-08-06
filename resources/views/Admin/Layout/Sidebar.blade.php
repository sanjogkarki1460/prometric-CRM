@section('sidebar')
    <div class="page-container">
        <div class="sidebar-container">
            <div class="sidemenu-container navbar-collapse collapse fixed-menu">
                <div id="remove-scroll" class="left-sidemenu">
                    <ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
                        data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <li class="sidebar-user-panel">
                            <div class="user-panel">
                                <div class="pull-left info">
                                    <p> {{Auth::user()->name}}</p>
                                    <p><i class="fa fa-circle user-online"></i><span class="txtOnline">
												Online</span></p>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.home')}}" class="nav-link nav-toggle"> <i class="fa fa-desktop"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-list"></i>
                                <span class="title">Category</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{route('Category.create')}}" class="nav-link ">
                                        <span class="title">Add Category</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('Category.index')}}" class="nav-link ">
                                        <span class="title">View Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-comment"></i>
                                <span class="title">Enquiry</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{route('Enquiry.create')}}" class="nav-link ">
                                        <span class="title">Add Enquiry</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('Enquiry.index')}}" class="nav-link ">
                                        <span class="title">View Enquiry</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-calendar-check-o"></i>
                                <span class="title">Applicant</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{route('Applicant.create')}}" class="nav-link ">
                                        <span class="title">Add Applicant</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('Applicant.index')}}" class="nav-link ">
                                        <span class="title">View Applicant</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('CheckList.index')}}" class="nav-link ">
                                        <span class="title">Document Checklist</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('Education.index')}}" class="nav-link ">
                                        <span class="title">Education</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('HealthLisence.index')}}" class="nav-link ">
                                        <span class="title">Health Lisence</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('Employment.index')}}" class="nav-link ">
                                        <span class="title">Employment</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-address-book"></i>
                                <span class="title">Send SMs</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{--{{route('EnquirySMS')}}--}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Enquiry</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{--{{route('ApplicantSMS')}}--}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Applicant</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-envelope-open"></i>
                                <span class="title">Send Mail</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{--{{route('EnquiryMail')}}--}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Enquiry</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{--{{route('ApplicantMail')}}--}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Applicant</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection