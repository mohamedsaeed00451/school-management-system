<div class="modal fade" id="repetQuizze{{ $degree->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('teacher.quizzes.repet',$degree->id) }}" method="post">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Dashboard_trans.repet') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Dashboard_trans.message_open_quizze') }}</h5>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('Dashboard_trans.open') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
