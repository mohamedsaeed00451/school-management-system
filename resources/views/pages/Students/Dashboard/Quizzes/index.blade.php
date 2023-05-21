@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('quizzes_trans.list_quizzes') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ trans('quizzes_trans.list_quizzes') }}
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
                                            <th>{{ trans('questions_trans.quizze_name') }}</th>
                                            <th>{{ trans('teacher_trans.Name_Teacher') }}</th>
                                            <th>{{ trans('questions_trans.score') }}</th>
                                            <th>{{ trans('quizzes_trans.your_degree') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($quizzes as $quizze)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $quizze->Name }}</td>
                                                <td>{{ $quizze->teacher->Name }}</td>
                                                <td>{{ number_format($quizze->question->sum('Score'))}}</td>
                                                <td>
                                                    @foreach($quizze->degree()->where('Quizze_id',$quizze->id)->where('Student_id',auth()->user()->id)->get() as $degree)

                                                            @if($degree->Abuse == 1)
                                                                <label style="color: red">{{trans('Message_trans.abuse')}}</label>
                                                            @else
                                                                <label style="color: green">{{$degree->Score}}</label>
                                                            @endif

                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if($quizze->degree()->where('Quizze_id',$quizze->id)->where('Student_id',auth()->user()->id)->count() > 0)
                                                        @foreach($quizze->degree()->where('Quizze_id',$quizze->id)->where('Student_id',auth()->user()->id)->get() as $degree)
                                                            @if($degree->Abuse == 1)
                                                                <a href="#" class="btn btn-danger btn-sm" role="button"
                                                                   aria-pressed="true"><i class="ti-unlock"></i></a>
                                                            @else
                                                                <a href="#" class="btn btn-info btn-sm" role="button"
                                                                   aria-pressed="true"><i class="ti-unlock"></i></a>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <a href="{{route('studentQuizzes.show',$quizze->id)}}"
                                                           onclick="alertAbuse()"
                                                           class="btn btn-success btn-sm" role="button"
                                                           aria-pressed="true"><i class="fas fa-book-open"></i></a>
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
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        function alertAbuse()
        {
            @if (App::getLocale() == 'ar')
                alert('برجاء عدم إعادة تحميل الصفحة بعد دخول الإختبار وإلا سوف يتم غلق الإختبار');
            @else
                alert('Please Do Not Reload The Page After Entering The Test ,Otherwise The Test Will Be Closed');
            @endif
        }
    </script>
@endsection

