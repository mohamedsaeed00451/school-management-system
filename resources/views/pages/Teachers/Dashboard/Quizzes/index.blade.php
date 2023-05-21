@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('quizzes_trans.list_quizzes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('quizzes_trans.list_quizzes') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{ route('teacherQuizzes.create') }}" class="btn btn-success" role="button"
                                aria-pressed="true">{{ trans('quizzes_trans.add_quizzes') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('questions_trans.quizze_name') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $quizze->Name }}</td>
                                                <td>{{ $quizze->grade->Name }}</td>
                                                <td>{{ $quizze->classroom->Name_Class }}</td>
                                                <td>{{ $quizze->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('teacherQuizzes.edit', $quizze->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>

                                                    <a href="{{ route('teacherQuestions.show', $quizze->id) }}"
                                                        class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-eye "></i></a>

                                                    <a href="{{ route('teacherQuizzes.show', $quizze->id) }}"
                                                       class="btn btn-primary btn-sm" role="button" aria-pressed="true"><i
                                                            class="fas fa-user-graduate"></i></a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $quizze->id }}" title="delete"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Teachers.Dashboard.Quizzes.delete')
                                        @endforeach
                                </table>
                            </div>
                        </div>
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
