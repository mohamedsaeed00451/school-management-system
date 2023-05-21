@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Expenses_trans.edit_fee_invoice') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Expenses_trans.edit_fee_invoice') }}
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

                <form action="{{ route('Fee_invoices.update', 'test') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('Students_trans.name') }}</label>
                            <input type="text" value="{{ $fee_invoices->student->Name }}" readonly name="title_ar"
                                class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">{{ trans('Expenses_trans.amount') }}</label>
                            <select class="custom-select mr-sm-2" name="Amount">
                                @foreach ($fees as $fee)
                                    <option value="{{ $fee->Amount }}"
                                        {{ $fee->id == $fee_invoices->Fee_id ? 'selected' : '' }}>{{ $fee->Amount }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputZip">{{ trans('Expenses_trans.fee_type') }}</label>
                            <select class="custom-select mr-sm-2" name="Fee_id">
                                @foreach ($fees as $fee)
                                    <option value="{{ $fee->id }}"
                                        {{ $fee->id == $fee_invoices->Fee_id ? 'selected' : '' }}>{{ $fee->Title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{ trans('Expenses_trans.notes') }}</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $fee_invoices->Notes }}</textarea>
                    </div>
                    <br>

                    <input type="hidden" value="{{ $fee_invoices->id }}" name="id" class="form-control">
                    <button type="submit" class="btn btn-success">{{ trans('Grades_trans.Update') }}</button>

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
