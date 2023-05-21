@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('Sections_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Sections_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Grades_trans.Name') }}</th>
                                <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                <th>{{ trans('Sections_trans.Name_Section') }}</th>
                                <th>{{ trans('Sections_trans.Status') }}</th>
                                <th>{{ trans('main_trans.students') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $section->grades->Name }}</td>
                                    <td>{{ $section->My_classs->Name_Class }}</td>
                                    <td>{{ $section->Name_Section }}</td>
                                    <td>
                                        @if ($section->Status === 1)
                                            <label
                                                class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                        @else
                                            <label
                                                class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($section->Status === 1)
                                            <a href="{{ route('students.section.show', $section->id) }}"
                                                class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                    class="fas fa-user-graduate"></i></a>
                                        @else
                                            <a href="#" class="btn btn-warning btn-sm" role="button"
                                                aria-pressed="true"><i class="ti-unlock"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
@endsection
