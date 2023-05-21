@extends('layouts.master')
@section('css')
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

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('onlineClasses_trans.address') }}</th>
                                            <th>{{ trans('onlineClasses_trans.start_data') }}</th>
                                            <th>{{ trans('onlineClasses_trans.time') }}</th>
                                            <th>{{ trans('onlineClasses_trans.link') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_classes as $online_classe)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_classe->grade->Name }}</td>
                                                <td>{{ $online_classe->classroom->Name_Class }}</td>
                                                <td>{{ $online_classe->section->Name_Section }}</td>
                                                @if($online_classe->User_id != null)
                                                    <td>{{ $online_classe->user->Name }}</td>
                                                @else
                                                    <td>{{ $online_classe->teacher->Name }}</td>
                                                @endif
                                                <td>{{ $online_classe->Topic }}</td>
                                                <td>{{ $online_classe->Start_at }}</td>
                                                <td>{{ $online_classe->Duration }}</td>
                                                <td class="text-danger"><a href="{{ $online_classe->Join_url }}"target="_blank">{{ trans('onlineClasses_trans.join_new') }}</a></td>
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
@endsection
