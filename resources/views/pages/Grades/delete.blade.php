<div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades_trans.Delete_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Grades.destroy', 'test') }}" method="post">
                    {{ method_field('Delete') }}
                    @csrf
                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Grades_trans.Warning') }}</h5>
                    <input id="id" type="hidden" name="id" value="{{ $Grade->id }}"
                        class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                <button type="submit" class="btn btn-danger">{{ trans('Grades_trans.Delete') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
