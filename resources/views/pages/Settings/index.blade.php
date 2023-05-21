@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.Settings') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Settings') }}
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

                <form enctype="multipart/form-data" method="post" action="{{ route('settings.update', 'test') }}">
                    @csrf @method('PUT')
                    <div class="row">
                        <div class="col-md-6 border-right-2 border-right-blue-400">

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.name') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_name" value="{{ $setting['school_name'] }}" type="text"
                                        class="form-control" placeholder="{{ trans('setting_trans.name') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.name_s') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $setting['school_title'] }}" type="text"
                                        class="form-control" placeholder="{{ trans('setting_trans.name_s') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="current_session"
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.current_year') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select data-placeholder="{{ trans('Parent_trans.Choose') }}" required
                                        name="current_session" id="current_session" class="select-search form-control">
                                        <option value="" disabled>{{ trans('Parent_trans.Choose') }}</option>
                                        @for ($y = date('Y', strtotime('- 2 years')); $y <= date('Y', strtotime('+ 2 years')); $y++)
                                            <option
                                                {{ $setting['current_session'] == ($y -= 1) . '-' . ($y += 1) ? 'selected' : '' }}>
                                                {{ ($y -= 1) . '-' . ($y += 1) }} </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.phone') }}</label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $setting['phone'] }}" type="text"
                                        class="form-control" placeholder="{{ trans('setting_trans.phone') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.email') }}</label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="{{ $setting['school_email'] }}" type="email"
                                        class="form-control" placeholder="{{ trans('setting_trans.email') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.address') }}<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input required name="address" value="{{ $setting['address'] }}" type="text"
                                        class="form-control" placeholder="{{ trans('setting_trans.address') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.end_term_1') }}
                                </label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $setting['end_first_term'] }}"
                                        type="text" class="form-control date-pick"
                                        placeholder="{{ trans('setting_trans.end_term_1') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.end_term_2') }}</label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $setting['end_second_term'] }}"
                                        type="text" class="form-control date-pick"
                                        placeholder="{{ trans('setting_trans.end_term_2') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    class="col-lg-2 col-form-label font-weight-semibold">{{ trans('setting_trans.logo') }}</label>
                                <div class="col-lg-9">
                                    <div class="mb-3">
                                        <img style="width: 100px" height="100px"
                                            src="{{ URL::asset('Attachments/Logo/' . $setting['logo']) }}"
                                            alt="{{ trans('setting_trans.logo') }}">
                                    </div>
                                    <input name="logo" accept="image/*" type="file" class="file-input"
                                        data-show-caption="false" data-show-upload="false" data-fouc>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
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
