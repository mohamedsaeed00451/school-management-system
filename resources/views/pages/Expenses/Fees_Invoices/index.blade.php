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
                                            <th>{{ trans('Expenses_trans.fee_type') }}</th>
                                            <th>{{ trans('Expenses_trans.amount') }}</th>
                                            <th>{{ trans('Expenses_trans.grade') }}</th>
                                            <th>{{ trans('Expenses_trans.class') }}</th>
                                            <th>{{ trans('Expenses_trans.notes') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Fee_invoices as $Fee_invoice)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $Fee_invoice->student->Name }}</td>
                                                <td>{{ $Fee_invoice->fees->Title }}</td>
                                                <td>{{ number_format($Fee_invoice->Amount, 2) }}</td>
                                                <td>{{ $Fee_invoice->grade->Name }}</td>
                                                <td>{{ $Fee_invoice->classroom->Name_Class }}</td>
                                                <td>{{ $Fee_invoice->Notes }}</td>
                                                <td>
                                                    <a href="{{ route('Fee_invoices.edit', $Fee_invoice->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Fee_invoice{{ $Fee_invoice->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('pages.Expenses.Fees_Invoices.Delete')
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
