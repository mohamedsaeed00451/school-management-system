@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Dashboard_trans.reports_attendances') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Dashboard_trans.reports_attendances') }}
@stop
<!-- breadcrumb -->

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

                    <form method="post" action="{{ route('parent.attendances.search') }}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{ trans('Dashboard_trans.data_search') }}
                        </h6><br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">{{ trans('main_trans.students') }}</label>
                                    <select class="custom-select mr-sm-2" name="student_id">
                                        <option value="0">{{ trans('Dashboard_trans.all') }}</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="card-body datepicker-form">

                                <div class="input-group" data-date-format="yyyy-mm-dd">
                                    <span class="input-group-addon">{{ trans('Dashboard_trans.from_date') }}</span>
                                    <input type="text" class="form-control range-from date-picker-default"
                                        placeholder="{{ trans('Dashboard_trans.start_date') }}" required name="from">
                                    <span class="input-group-addon">{{ trans('Dashboard_trans.to_date') }}</span>
                                    <input class="form-control range-to date-picker-default"
                                        placeholder="{{ trans('Dashboard_trans.end_date') }}" type="text" required
                                        name="to">
                                </div>

                            </div>

                        </div>
                        <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
                    </form>

                    <br />


                    @isset($studentAttendances)
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('Students_trans.name') }}</th>
                                        <th class="alert-success">{{ trans('attendance_trans.presence') }}</th>
                                        <th class="alert-danger">{{ trans('attendance_trans.absent') }}</th>
                                        <th>{{ trans('Dashboard_trans.reports') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentAttendances as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->Name }}</td>
                                            <td>{{ $student->attendance()->whereBetween('Attendance_date', [$from, $to])->where('Attendance_status', 1)->count() }}
                                            </td>
                                            <td>{{ $student->attendance()->whereBetween('Attendance_date', [$from, $to])->where('Attendance_status', 0)->count() }}
                                            </td>
                                            <td>
                                                <a href="{{route('parent.attendance.report.show.details',[$student->id,$to,$from])}}" type="submit" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
