@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('questions_trans.add_questions') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('questions_trans.add_questions') }}
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
                        <form action="{{ route('teacherQuestions.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('questions_trans.question') }}</label>
                                    <input type="text" name="Title" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('questions_trans.answers') }} :  <span style="color: red; font-size: smaller">{{ trans('questions_trans.rule') }} </span></label>
                                    <textarea name="Answers" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('questions_trans.right_answer') }}</label>
                                    <input type="text" name="Right_answer" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id"> {{ trans('questions_trans.quizze_name') }} : <span
                                                class="text-danger">*</span></label>
                                        @if (isset($quizze_data))
                                            <select class="custom-select mr-sm-2" name="Quizze_id">
                                                <option selected value="{{ $quizze_data->id }}">{{ $quizze_data->Name }}
                                                </option>
                                            </select>
                                        @else
                                            <select class="custom-select mr-sm-2" name="Quizze_id">
                                                <option selected disabled>{{ trans('Parent_trans.Choose') }}...
                                                </option>
                                                @foreach ($quizzes as $quizze)
                                                    <option value="{{ $quizze->id }}">{{ $quizze->Name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('questions_trans.score') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Score">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
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
