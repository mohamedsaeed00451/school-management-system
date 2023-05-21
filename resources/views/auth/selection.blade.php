<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <title>{{ trans('Main_trans.Program_name') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ URL::asset('login/images/icons/favicon.ico') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('login/css/main.css') }}">
    <!--===============================================================================================-->
    <!-- css -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container-login100 ">
        <section class="height-100vh d-flex align-items-center limiter">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">

                    <div style="border-radius: 15px;" class="col-lg-6 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">{{ trans('Auth.type') }}</h3>
                            <div class="form-inline">

                                <a class="btn btn-default js-tilt" title="{{ trans('Auth.student') }}"
                                    href="{{ route('login.show', 'student') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/student.png') }}">
                                </a>
                                <a class="btn btn-default js-tilt" title="{{ trans('Auth.parent') }}"
                                    href="{{ route('login.show', 'parent') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/parent.png') }}">
                                </a>
                                <a class="btn btn-default js-tilt" title="{{ trans('Auth.teacher') }}"
                                    href="{{ route('login.show', 'teacher') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/teacher.png') }}">
                                </a>
                                <a class="btn btn-default js-tilt" title="{{ trans('Auth.admin') }}"
                                    href="{{ route('login.show', 'admin') }}">
                                    <img alt="user-img" width="100px;"
                                        src="{{ URL::asset('assets/images/admin.png') }}">
                                </a>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 login-->

    </div>
    <script src="{{ URL::asset('login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ URL::asset('login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('login/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ URL::asset('login/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
</body>

</html>
