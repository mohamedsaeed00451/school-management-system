@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Expenses_trans.invoices') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Expenses_trans.invoices') }}
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
                                            <th>{{ trans('Expenses_trans.name_fee') }}</th>
                                            <th>{{ trans('Expenses_trans.amount') }}</th>
                                            <th>{{ trans('Dashboard_trans.paid') }}</th>
                                            <th>{{ trans('Dashboard_trans.remaining') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->Name }}</td>
                                                <td>{{ number_format($student->student_account_expenses->sum('Debit'), 2) }}</td>
                                                <td>{{ number_format($student->student_account_expenses->sum('Credit'), 2) }}</td>
                                                <td>{{ number_format($student->student_account_expenses->sum('Debit') - $student->student_account_expenses->sum('Credit'), 2) }}</td>
                                                <td>
                                                    <a href="{{ route('parent.student.fees.details',$student->id) }}"
                                                        class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-eye"></i></a>
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
