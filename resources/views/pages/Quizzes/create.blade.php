@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('quizzes_trans.add_quizzes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('quizzes_trans.add_quizzes') }}
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
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('quizzes.store') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('Students_trans.name_ar') }}</label>
                                    <input type="text" name="Name_ar" class="form-control">
                                </div>

                                <div class="col">
                                    <label for="title">{{ trans('Students_trans.name_en') }}</label>
                                    <input type="text" name="Name_en" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('subjects_trans.name') }}: <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Subject_id">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('teacher_trans.Name_Teacher') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Teacher_id">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">

                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Section_id">{{ trans('Students_trans.section') }} : </label>
                                        <select class="custom-select mr-sm-2" name="Section_id">

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success"
                                type="submit">{{ trans('Students_trans.submit') }}</button>
                        </form>
                    </div>
                </div>
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
