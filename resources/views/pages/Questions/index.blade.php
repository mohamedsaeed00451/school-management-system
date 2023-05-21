@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('questions_trans.list_questions') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('questions_trans.list_questions') }}
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
                            <a href="{{ route('questions.create') }}" class="btn btn-success" role="button"
                                aria-pressed="true">{{ trans('questions_trans.add_questions') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ trans('questions_trans.question') }}</th>
                                            <th scope="col">{{ trans('questions_trans.answers') }}</th>
                                            <th scope="col">{{ trans('questions_trans.right_answer') }}</th>
                                            <th scope="col">{{ trans('questions_trans.score') }}</th>
                                            <th scope="col">{{ trans('questions_trans.quizze_name') }}</th>
                                            <th scope="col">{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->Title }}</td>
                                                <td>{{ $question->Answers }}</td>
                                                <td>{{ $question->Right_answer }}</td>
                                                <td>{{ $question->Score }}</td>
                                                <td>{{ $question->quizze->Name }}</td>
                                                <td>
                                                    <a href="{{ route('questions.edit', $question->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $question->id }}" title="delete"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            @include('pages.Questions.destroy')
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
