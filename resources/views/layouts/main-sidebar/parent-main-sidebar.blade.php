<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/parent/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('Main_trans.Home') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('Main_trans.Program_name') }} </li>


                    <!-- Students -->
                    <li>
                        <a href="{{ route('parent.students') }}"><i class="fas fa-user-graduate"></i><span
                                class="right-nav-text">{{ trans('main_trans.students') }}</span></a>
                    </li>


                    <!-- Reports -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu1">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">{{ trans('Dashboard_trans.reports') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu1" class="collapse" data-parent="#sidebarnav">
                            <li><a
                                    href="{{ route('parent.attendances') }}">{{ trans('Dashboard_trans.reports_attendances') }}</a>
                            </li>
                            <li><a href="{{ route('parent.students.degrees') }}">{{ trans('Dashboard_trans.reports_quizzes') }}</a></li>

                        </ul>

                    </li>

                    <!-- Fees -->
                    <li>
                        <a href="{{ route('parent.student.fees') }}"><i class="fas fa-bookmark"></i><span class="right-nav-text">{{ trans('main_trans.invoices') }}</span></a>
                    </li>

                    <!-- Profile -->
                    <li>
                        <a href="{{route('parentProfile.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{ trans('Dashboard_trans.profile') }}</span></a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

