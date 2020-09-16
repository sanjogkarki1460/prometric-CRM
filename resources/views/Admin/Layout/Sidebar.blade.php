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

                        @if(Auth::user()->role=='Admin')
                            <li class="nav-item start ">
                                <a class="nav-link nav-toggle">
                                    <i class="fa fa-user-circle"></i>
                                    <span class="title">Users</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item   ">
                                        <a href="{{route('Admin.create')}}" class="nav-link ">
                                            <span class="title">Add Users</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('Admin.index')}}" class="nav-link ">
                                            <span class="title">View Users</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        @endif
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
                                    <li class="nav-item   ">
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
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">View Applicant</span>
                                            <span class="arrow "></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{route('Applicant.index')}}" class="nav-link nav-toggle">
                                                    <i class="title"></i> All Applicant
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('ApplicantWhitelist')}}" class="nav-link">
                                                    <i class="title"></i> White List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('ApplicantRedlist')}}" class="nav-link">
                                                    <i class="title"></i> Red List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('ApplicantBlacklist')}}" class="nav-link">
                                                    <i class="title"></i> Black List </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('ApplicantGreenlist')}}" class="nav-link">
                                                    <i class="title"></i> Green List </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('CheckList.index')}}" class="nav-link ">
                                            <span class="title">Document Checklist</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">Education</span>
                                            <span class="arrow "></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{route('Education.index')}}" class="nav-link nav-toggle">
                                                    <i class="title"></i> Education 1
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('Education2.index')}}" class="nav-link">
                                                    <i class="title"></i> Education 2 </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">Health Lisence</span>
                                            <span class="arrow "></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{route('HealthLicense.index')}}" class="nav-link nav-toggle">
                                                    <i class="title"></i> Health Lisence 1
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('HealthLicense2.index')}}" class="nav-link">
                                                    <i class="title"></i> Health Lisence 2 </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link nav-toggle">
                                            <span class="title">Employment</span>
                                            <span class="arrow "></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="{{route('Employment.index')}}" class="nav-link nav-toggle">
                                                    <i class="title"></i> Employment 1
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('Employment2.index')}}" class="nav-link">
                                                    <i class="title"></i> Employment 2 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('Employment3.index')}}" class="nav-link nav-toggle">
                                                    <i class="title"></i> Employment 3
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('Employment4.index')}}" class="nav-link">
                                                    <i class="title"></i> Employment 4 </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('Employment5.index')}}" class="nav-link">
                                                    <i class="title"></i> Employment 5 </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('ProgressFlow.index')}}" class="nav-link ">
                                            <span class="title">Progress Flow Report</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-calendar"></i>
                                <span class="title">Appointment</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{route('EnquiryAppointment.index')}}" class="nav-link ">
                                        <span class="title">Enquiry Applintment</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('ApplicantAppointment.index')}}" class="nav-link ">
                                        <span class="title">Applicant Applontment</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-history"></i>
                                <span class="title">Call Log</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item   ">
                                    <a href="{{route('IncomingCallLog.index')}}" class="nav-link ">
                                        <span class="title">Incoming call log</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('OutgoingCallLog.index')}}" class="nav-link ">
                                        <span class="title">Outgoing call log</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item start ">
                            <a class="nav-link nav-toggle">
                                <i class="fa fa-flag"></i>
                                <span class="title">Visitor Log</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="{{route('VisitorLog.create')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">Add Visitor Log</span>
                                    </a>
                                </li>
                                <li class="nav-item   ">
                                    <a href="{{route('VisitorLog.index')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">View Visitor Log</span>
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
                                    <a href="{{route('EnquirySMS')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Enquiry</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('ApplicantSMS')}}" class="nav-link ">
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
                                    <a href="{{route('EnquiryMail')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Enquiry</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{route('ApplicantMail')}}" class="nav-link ">
                                        <i class="fa fa-user"></i>
                                        <span class="title">To Applicant</span>
                                    </a>
                                </li>
                            </ul>
                        </li
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection