@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Dashboard_trans.reports_attendances') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Dashboard_trans.reports_attendances') }} : <label style="color: red">{{ $student->Name }}</label>
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th class="alert-success">#</th>
                                <th class="alert-success">{{ trans('Dashboard_trans.date') }}</th>
                                <th class="alert-success">{{ trans('Sections_trans.Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->attendance()->whereBetween('Attendance_date', [$from, $to])->get() as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->Attendance_date }}</td>
                                    <td>
                                        @if ($student->Attendance_status == 0)
                                            <span class="btn-danger">{{ trans('attendance_trans.absent') }}</span>
                                        @else
                                            <span class="btn-success">{{ trans('attendance_trans.presence') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
