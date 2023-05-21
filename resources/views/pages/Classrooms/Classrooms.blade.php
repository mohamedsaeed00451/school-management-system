@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('My_Classes_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('My_Classes_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
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

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('My_Classes_trans.add_class') }}
                </button>

                <button type="button" class="btn btn-danger" id="btn_delete_all">
                    {{ trans('My_Classes_trans.delete_checkbox') }}
                </button>


                <br><br>

                <form action="{{ route('filter_classes') }}" method="post">
                    {{ csrf_field() }}
                    <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('My_Classes_trans.Search_By_Grade') }}
                        </option>
                        @foreach ($Grades as $Grade)
                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                        @endforeach
                    </select>
                </form>
                <br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>
                                    <p>{{ trans('My_Classes_trans.Select') }}</p><input name="select_all"
                                        id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" />
                                </th>
                                <th>#</th>
                                <th>{{ trans('My_Classes_trans.Name_class') }}</th>
                                <th>{{ trans('My_Classes_trans.Name_Grade') }}</th>
                                <th>{{ trans('My_Classes_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if (isset($details))
                                    <?php $List_Classes = $details; ?>
                                @else
                                    <?php $List_Classes = $Classrooms; ?>
                                @endif
                                <?php $i = 0; ?>
                                @foreach ($List_Classes as $Classroom)
                                    <?php $i++; ?>
                                    <td><input type="checkbox" value="{{ $Classroom->id }}" class="box1"></td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Classroom->Name_Class }}</td>
                                    <td>{{ $Classroom->Grades->Name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $Classroom->id }}"
                                            title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $Classroom->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            <!-- edit_modal_Classrooms -->
                            @include('pages\Classrooms\edit')
                            <!-- delete_modal_Classrooms -->
                            @include('pages\Classrooms\delete')
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- add_modal_class -->
    @include('pages\Classrooms\create')
</div>

<!-- Delete Rows Groupe -->
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Grades_trans.Warning') }}</h5>
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('My_Classes_trans.Delete') }}</button>
                </div>
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
