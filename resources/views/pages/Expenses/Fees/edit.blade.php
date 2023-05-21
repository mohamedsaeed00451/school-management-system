@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Expenses_trans.edit_fee') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Expenses_trans.edit_fee') }}
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

                <form action="{{ route('Fees.update', 'test') }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('Expenses_trans.name_ar') }}</label>
                            <input type="text" value="{{ $fee->getTranslation('Title', 'ar') }}" name="Title_ar"
                                class="form-control">
                            <input type="hidden" value="{{ $fee->id }}" name="id" class="form-control">
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('Expenses_trans.name_en') }}</label>
                            <input type="text" value="{{ $fee->getTranslation('Title', 'en') }}" name="Title_en"
                                class="form-control">
                        </div>


                        <div class="form-group col">
                            <label for="inputEmail4">{{ trans('Expenses_trans.amount') }}</label>
                            <input type="number" value="{{ $fee->Amount }}" name="Amount" class="form-control">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputState">{{ trans('Expenses_trans.grade') }}</label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}"
                                        {{ $Grade->id == $fee->Grade_id ? 'selected' : '' }}>{{ $Grade->Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="inputZip">{{ trans('Expenses_trans.class') }}</label>
                            <select class="custom-select mr-sm-2" name="Classroom_id">
                                <option value="{{ $fee->Classroom_id }}">{{ $fee->classroom->Name_Class }}</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">{{ trans('Expenses_trans.year') }}</label>
                            <select class="custom-select mr-sm-2" name="Year">
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}" {{ $year == $fee->Year ? 'selected' : ' ' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">{{ trans('Expenses_trans.notes') }}</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $fee->Notes }}</textarea>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-success">{{ trans('Students_trans.submit') }}</button>

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
