<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/teacher/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('Main_trans.Home') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('Main_trans.Program_name') }} </li>

                    <!-- Quizzes-->
                    <li>
                        <a href="{{route('studentQuizzes.index')}}"><i class="fas fa-book-open"></i><span class="right-nav-text">{{ trans('main_trans.quizzes') }}</span></a>
                    </li>

                    <!-- Onlinec Classes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                            <div class="pull-left"><i class="fas fa-video"></i><span
                                    class="right-nav-text">{{ trans('main_trans.Onlineclasses') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('student.classrooms') }}">{{ trans('main_trans.list_Onlineclasses') }}</a>
                            </li>
                        </ul>
                    </li>

                    <!-- library-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                            <div class="pull-left"><i class="fas fa-book"></i><span
                                    class="right-nav-text">{{ trans('main_trans.library') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('books.student.index') }}">{{ trans('main_trans.books') }}</a> </li>
                        </ul>
                    </li>

                    <!-- Profile -->
                    <li>
                        <a href="{{route('studentProfile.index')}}"><i class="fas fa-id-card-alt"></i><span class="right-nav-text">{{ trans('Dashboard_trans.profile') }}</span></a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

