@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('onlineClasses_trans.list_classes') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('onlineClasses_trans.list_classes') }}
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

                            <a href="{{ route('teacherOnlineClasses.create') }}" class="btn btn-success" role="button"aria-pressed="true">{{ trans('onlineClasses_trans.add_class_on') }}</a>
                            <a class="btn btn-warning" href="{{ route('teacher.indirect.create') }}">{{ trans('onlineClasses_trans.add_class_of') }}</a>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('onlineClasses_trans.address') }}</th>
                                            <th>{{ trans('onlineClasses_trans.start_data') }}</th>
                                            <th>{{ trans('onlineClasses_trans.time') }}</th>
                                            <th>{{ trans('onlineClasses_trans.link') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->grade->Name }}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{ $online_classe->section->Name_Section }}</td>
                                                <td>{{ $online_classe->Topic }}</td>
                                                <td>{{ $online_classe->Start_at }}</td>
                                                <td>{{ $online_classe->Duration }}</td>
                                                <td class="text-danger"><a href="{{ $online_classe->Join_url }}"target="_blank">{{ trans('onlineClasses_trans.join_new') }}</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $online_classe->Meeting_id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                             @include('pages.Teachers.Dashboard.OnlineClasses.delete')
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
