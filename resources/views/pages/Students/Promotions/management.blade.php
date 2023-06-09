@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.list_students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.list_students') }}
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

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                {{ trans('Students_trans.back_all') }}
                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{ trans('Students_trans.name') }}</th>
                                            <th class="alert-danger">{{ trans('Students_trans.old_academy') }}</th>
                                            <th class="alert-danger">{{ trans('Students_trans.old_year') }}</th>
                                            <th class="alert-danger">{{ trans('Students_trans.old_class') }}</th>
                                            <th class="alert-danger">{{ trans('Students_trans.old_section') }}</th>
                                            <th class="alert-success">{{ trans('Students_trans.new_academy') }}</th>
                                            <th class="alert-success">{{ trans('Students_trans.new_year') }}</th>
                                            <th class="alert-success">{{ trans('Students_trans.new_class') }}</th>
                                            <th class="alert-success">{{ trans('Students_trans.new_section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $promotion->student->Name }}</td>
                                                <td>{{ $promotion->f_grade->Name }}</td>
                                                <td>{{ $promotion->Academic_year }}</td>
                                                <td>{{ $promotion->f_classroom->Name_Class }}</td>
                                                <td>{{ $promotion->f_section->Name_Section }}</td>
                                                <td>{{ $promotion->t_grade->Name }}</td>
                                                <td>{{ $promotion->Academic_year_new }}</td>
                                                <td>{{ $promotion->t_classroom->Name_Class }}</td>
                                                <td>{{ $promotion->t_section->Name_Section }}</td>
                                                <td>

                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-toggle="modal"
                                                        data-target="#Delete_one{{ $promotion->id }}">{{ trans('Students_trans.student_back') }}</button>
                                                    <button type="button" class="btn btn-outline-success"
                                                        data-toggle="modal" data-target="#graduate_one{{ $promotion->student->id }}">{{ trans('Students_trans.student_out') }}</button>
                                                </td>
                                            </tr>
                                            @include('pages.Students.Promotions.Delete_all')
                                            @include('pages.Students.Promotions.Delete_one')
                                            @include('pages.Students.Promotions.graduate_one')
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
