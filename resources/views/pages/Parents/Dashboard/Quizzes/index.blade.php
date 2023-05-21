@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Dashboard_trans.reports_quizzes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    @if(isset($student))
        {{ trans('Dashboard_trans.reports_quizzes') }} : <label style="color: red">{{ $student->Name }}</label>
    @else
        {{ trans('Dashboard_trans.reports_quizzes') }}
    @endif
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('questions_trans.quizze_name') }}</th>
                                            @if(isset($student))
                                            @else
                                                <th>{{ trans('Students_trans.name') }}</th>
                                            @endif
                                            <th>{{ trans('Teacher_trans.date') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('questions_trans.score') }}</th>
                                            <th>{{ trans('Dashboard_trans.degree_stu') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($degrees as $degree)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $degree->quizze->Name }}</td>
                                                @if(isset($student))
                                                @else
                                                <td>{{ $degree->student->Name }}</td>
                                                @endif
                                                <td>{{ $degree->Date }}</td>
                                                <td>{{ $degree->quizze->grade->Name }}</td>
                                                <td>{{ $degree->quizze->classroom->Name_Class }}</td>
                                                <td>{{ $degree->quizze->section->Name_Section }}</td>
                                                <td>{{ number_format($degree->quizze->question->sum('Score'))}}</td>
                                                <td>
                                                    @if($degree->Abuse == 1 )
                                                        <label style="color: red">{{trans('Message_trans.abuse')}}</label>
                                                    @else
                                                        <label style="color: green">{{ $degree->Score }}</label>
                                                    @endif
                                                </td>
                                            </tr>
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
