@extends('layouts.master')
@section('css')
    @toastr_css
    @livewireStyles
    @section('title')
        {{ trans('questions_trans.list_questions') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ trans('questions_trans.list_questions') }} : <label style="color: red">{{ $quizze->Name }}</label>
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @livewire('student-quizze',['quizze_id' => $quizze->id ,'student_id' => $student_id])

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    @livewireScripts
@endsection

