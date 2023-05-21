@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Expenses_trans.edit_pay') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Expenses_trans.edit_pay') }} : <label style="color: red">{{ $payment_student->student->Name }}</label>
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

                <form action="{{ route('Payments.update', 'test') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('Expenses_trans.amount') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="Amount" value="{{ $payment_student->Amount }}"
                                    type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('Expenses_trans.notes') }} : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $payment_student->Notes }}</textarea>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="id" value="{{ $payment_student->id }}" class="form-control">
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">{{ trans('Grades_trans.Update') }}</button>
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
