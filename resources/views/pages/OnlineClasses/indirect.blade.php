@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('onlineClasses_trans.add_class_of') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('onlineClasses_trans.add_class_of') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('indirect.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="Section_id">

                                </select>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.meeting_number') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Meeting_id" type="text">
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.address') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Topic" type="text">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.start_data') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="Start_time">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.time') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Duration" type="number">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.meeting_password') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Password" type="text">
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.your_link') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Start_url" type="text">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>{{ trans('onlineClasses_trans.meeting_link_student') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="Join_url" type="text">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
