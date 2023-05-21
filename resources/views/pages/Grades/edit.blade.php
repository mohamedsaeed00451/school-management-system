<div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades_trans.Edit_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Grades.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name_ar" class="mr-sm-2">{{ trans('Grades_trans.Stage_Name_Ar') }}
                                :</label>
                            <input id="Name_ar" type="text" name="Name_ar"
                                value="{{ $Grade->getTranslation('Name', 'ar') }}" class="form-control" required>
                            <input id="id" type="hidden" name="id" value="{{ $Grade->id }}"
                                class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Grades_trans.Stage_Name_En') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en"
                                value="{{ $Grade->getTranslation('Name', 'en') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1" rows="3">{{ $Grade->Notes }}</textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Grades_trans.Update') }}</button>
            </div>
            </form>
        </div>
    </div>
</div>
