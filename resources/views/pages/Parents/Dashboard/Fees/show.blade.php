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
    {{ trans('Expenses_trans.invoices') }}  :  <label style="color: red">{{ $student->Name }}</label>
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
                                            <th>{{ trans('Expenses_trans.fee_type') }}</th>
                                            <th>{{ trans('Expenses_trans.amount') }}</th>
                                            <th>{{ trans('Expenses_trans.grade') }}</th>
                                            <th>{{ trans('Expenses_trans.class') }}</th>
                                            <th>{{ trans('Expenses_trans.notes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fees as $Fee_invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Fee_invoice->fees->Title }}</td>
                                                <td>{{ number_format($Fee_invoice->Amount, 2) }}</td>
                                                <td>{{ $Fee_invoice->grade->Name }}</td>
                                                <td>{{ $Fee_invoice->classroom->Name_Class }}</td>
                                                <td>{{ $Fee_invoice->Notes }}</td>
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
