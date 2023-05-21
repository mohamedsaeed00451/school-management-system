@extends('layouts.master')
@section('css')
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
                                                    <td>{{ $book->user->Name }}</td>
                                                @else
                                                    <td>{{ $book->teacher->Name }}</td>
                                                @endif
                                                <td>{{ $book->grade->Name }}</td>
                                                <td>{{ $book->classroom->Name_Class }}</td>
                                                <td>{{ $book->section->Name_Section }}</td>
                                                <td>
                                                    <a href="{{ route('book.download', $book->File_name) }}"
                                                        title="download" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="fas fa-download"></i></a>
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
@endsection
