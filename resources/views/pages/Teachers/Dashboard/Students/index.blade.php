@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('attendance_trans.list_attendance') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('attendance_trans.list_attendance') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ session('status') }}</li>
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('attendance_trans.date') }} :
                            {{ date('Y-m-d') }}</h5>
                        <form method="post" action="{{ route('attendance.store') }}">

                            @csrf
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                                        <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->Name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->gender->Name }}</td>
                                            <td>{{ $student->grade->Name }}</td>
                                            <td>{{ $student->classroom->Name_Class }}</td>
                                            <td>{{ $student->section->Name_Section }}</td>
                                            <td>

                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                    <input name="attendances[{{ $student->id }}]"
                                                        @foreach ($student->attendance()->where('Attendance_date', date('Y-m-d'))->get() as $attendance)
                                                            {{ $attendance->Attendance_status == 1 ? 'checked' : '' }} @endforeach
                                                        class="leading-tight" type="radio" value="presence">
                                                    <span
                                                        class="text-success">{{ trans('attendance_trans.presence') }}</span>
                                                </label>

                                                <label class="ml-4 block text-gray-500 font-semibold">
                                                    <input name="attendances[{{ $student->id }}]"
                                                        @foreach ($student->attendance()->where('Attendance_date', date('Y-m-d'))->get() as $attendance)
                                                            {{ $attendance->Attendance_status == 0 ? 'checked' : '' }} @endforeach
                                                        class="leading-tight" type="radio" value="absent">
                                                    <span
                                                        class="text-danger">{{ trans('attendance_trans.absent') }}</span>
                                                </label>


                                                <input type="hidden" name="Student_id[]" value="{{ $student->id }}">
                                                <input type="hidden" name="Grade_id" value="{{ $student->Grade_id }}">
                                                <input type="hidden" name="Classroom_id"
                                                    value="{{ $student->Classroom_id }}">
                                                <input type="hidden" name="Section_id"
                                                    value="{{ $student->Section_id }}">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <P>
                                <button class="btn btn-success"
                                    type="submit">{{ trans('Students_trans.submit') }}</button>
                            </P>
                        </form><br>
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
