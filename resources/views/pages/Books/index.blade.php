@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.books') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.books') }}
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

                            <a href="{{ route('libraries.create') }}" class="btn btn-success" role="button"
                                aria-pressed="true">{{ trans('library_trans.add_book') }}</a>
                                <br><br>

                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('library_trans.name') }}</th>
                                            <th>{{ trans('teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $book->Title }}</td>
                                                @if($book->User_id != null)
                                                    @if($book->User_id == auth()->user()->id)
                                                        <td>{{ trans('teacher_trans.you') }}</td>
                                                    @else
                                                        <td>{{ $book->user->Name }}</td>
                                                    @endif
                                                @else
                                                    <td>{{ $book->teacher->Name }}</td>
                                                @endif
                                                <td>{{ $book->grade->Name }}</td>
                                                <td>{{ $book->classroom->Name_Class }}</td>
                                                <td>{{ $book->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('downloadAttachment', $book->File_name) }}"
                                                        title="download" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="fas fa-download"></i></a>

                                                    <a href="{{ route('libraries.edit', $book->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_book{{ $book->id }}" title="delete"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>

                                            @include('pages.Books.destroy')
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
