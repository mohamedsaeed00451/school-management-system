@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('subjects_trans.add_subject') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('subjects_trans.add_subject') }}
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
                        <form action="{{ route('subjects.store') }}" method="post" autocomplete="off">
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
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('Students_trans.Grade') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('Students_trans.classrooms') }}</label>
                                    <select name="Classroom_id" class="custom-select my-1 mr-sm-2">

                                    </select>
                                </div>

                                <div class="form-group col">
                                    <label for="inputState">{{ trans('teacher_trans.Name_Teacher') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Teacher_id">
                                        <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->Name }}</option>
                                        @endforeach
                                    </select>
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
