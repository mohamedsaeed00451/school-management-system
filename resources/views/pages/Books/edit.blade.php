@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('library_trans.edit_book') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('library_trans.edit_book') }} : <label style="color: red">{{ $book->Title }}</label>
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
            
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('libraries.update', 'test') }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">{{ trans('library_trans.name') }}</label>
                                    <input type="text" name="Title" value="{{ $book->Title }}"
                                        class="form-control">
                                </div>

                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}"
                                                    {{ $book->Grade_id == $grade->id ? 'selected' : '' }}>
                                                    {{ $grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                                class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Classroom_id">
                                            <option value="{{ $book->Classroom_id }}">
                                                {{ $book->classroom->Name_Class }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                        <select class="custom-select mr-sm-2" name="Section_id">
                                            <option value="{{ $book->Section_id }}">{{ $book->section->Name_Section }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">

                                    <embed src="{{ URL::asset('Attachments/Books/' . $book->File_name) }}"
                                        type="application/pdf" height="150px" width="100px"><br><br>

                                    <div class="form-group">
                                        <label for="academic_year">{{ trans('Students_trans.Attachments') }} : <span
                                                class="text-danger">*</span></label>
                                        <input type="file" accept="application/pdf" name="File_name">
                                    </div>

                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $book->id }}"class="form-control">
                            <button class="btn btn-success"
                                type="submit">{{ trans('Students_trans.submit') }}</button>
                        </form>
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
