<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">

        @if (auth('web')->check())
            @php
                $dashboard = url('/admin/dashboard');
            @endphp
        @elseif (auth('student')->check())
            @php
                $dashboard = url('/student/dashboard');
            @endphp
        @elseif (auth('parent')->check())
            @php
                $dashboard = url('/parent/dashboard');
            @endphp
        @elseif (auth('teacher')->check())
            @php
                $dashboard = url('/teacher/dashboard');
            @endphp
        @endif

        <a class="navbar-brand brand-logo" href="{{ $dashboard }}"><img
                src="{{ URL::asset('assets/images/logo-dark.png') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="{{ $dashboard }}"><img
                src="{{ URL::asset('assets/images/logo-icon-dark.png') }}" alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value=""
                        name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">

        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </div>

        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>{{ trans('Sidebar_trans.Notifications') }}</strong>
                    <span class="badge badge-pill badge-warning">{{ auth()->user()->unreadNotifications->count() }}</span>
                    <a href="{{ route('readNotifications', auth()->user()->id) }}" class="mr-1 ml-1 badge badge-pill badge-info">{{ trans('Sidebar_trans.read') }}</a>
                </div>
                <div class="dropdown-divider"></div>

                @if (auth('web')->check())
                    @include('layouts.main-header-notifications.Admins')
                @elseif (auth('student')->check())
                    @include('layouts.main-header-notifications.Students')
                @elseif (auth('parent')->check())
                    @include('layouts.main-header-notifications.Parents')
                @elseif (auth('teacher')->check())
                    @include('layouts.main-header-notifications.Teachers')
                @endif

            </div>
        </li>


{{--        <li class="nav-item dropdown ">--}}
{{--            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"--}}
{{--                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-right dropdown-big">--}}
{{--                <div class="dropdown-header">--}}
{{--                    <strong>Quick Links</strong>--}}
{{--                </div>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <div class="nav-grid">--}}
{{--                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>--}}
{{--                        <h5>New Task</h5>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>--}}
{{--                        <h5>Assign Task</h5>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="nav-grid">--}}
{{--                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>--}}
{{--                        <h5>Add Orders</h5>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>--}}
{{--                        <h5>New Orders</h5>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

        <li class="nav-item dropdown mr-30">
            <a href="#" class="nav-link nav-pill user-avatar" data-toggle="dropdown" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">

            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            @if (auth('parent')->check())
                                <h5 class="mt-0 mb-0">{{ Auth::user()->Name_Father }}</h5>
                            @else
                                <h5 class="mt-0 mb-0">{{ Auth::user()->Name }}</h5>
                            @endif
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="text-danger fas fa-sign-out"></i>{{ __('Sidebar_trans.Logoff') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    @if (auth('student')->check())
                        <input type="hidden" value="student" name="type">
                    @elseif(auth('teacher')->check())
                        <input type="hidden" value="teacher" name="type">
                    @elseif(auth('parent')->check())
                        <input type="hidden" value="parent" name="type">
                    @else
                        <input type="hidden" value="web" name="type">
                    @endif
                </form>
            </div>
        </li>
    </ul>
</nav>

<!--=================================
header End-->
