@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Expenses_trans.add_pro_fee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Expenses_trans.add_pro_fee') }} : <label style="color: red">{{ $student->Name }}</label>
@stop
<!-- breadcrumb -->
@endsection
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

                <form method="post" action="{{ route('Processing_fees.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Expenses_trans.amount') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="Amount" type="number">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('Expenses_trans.student_credit') }} : </label>
                                <input class="form-control" name="final_balance"
                                    value="{{ number_format($student->student_account_expenses->sum('Debit') - $student->student_account_expenses->sum('Credit'), 2) }}"
                                    type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('Expenses_trans.notes') }} : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="Student_id" value="{{ $student->id }}" class="form-control">
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>

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
