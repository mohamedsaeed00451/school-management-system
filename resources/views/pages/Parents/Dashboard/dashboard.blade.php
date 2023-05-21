<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ trans('Main_trans.Program_name') }}</title>
    @include('layouts.head')
</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
    </div>

    <!--=================================
preloader -->

    @include('layouts.main-header')

    @include('layouts.main-sidebar')

    <!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-20" style="font-family: 'Cairo', sans-serif">
                        {{ trans('Dashboard_trans.welcome') }} : {{ Auth::user()->Name_Father }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>
        </div>

        <br/>


        <div class="row justify-content-center">

            @foreach($students as $student)

            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <img class="card-img-top text-center" src="{{ URL::asset('assets/images/student.png') }}" alt="صورة">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $student->Name }}</h5>
                            <h6 class="text-center">{{ trans('Students_trans.Grade') }} : <label style="color: red">{{ $student->grade->Name }}</label></h6>
                            <h6 class="text-center">{{ trans('Students_trans.classrooms') }} : <label style="color: red">{{ $student->classroom->Name_Class }}</label></h6>
                            <h6 class="text-center">{{ trans('Students_trans.section') }} : <label style="color: red">{{ $student->section->Name_Section }}</label></h6>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>


        <!--=================================
wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')
</body>

</html>

