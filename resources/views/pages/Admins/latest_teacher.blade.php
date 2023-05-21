<div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
    <div class="table-responsive mt-15">
        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
            <thead>
                <tr class="table-info text-danger">
                    <th>#</th>
                    <th>{{ trans('Students_trans.name') }}</th>
                    <th>{{ trans('Teacher_trans.Gender') }}</th>
                    <th>{{ trans('Teacher_trans.Joining_Date') }}</th>
                    <th>{{ trans('Teacher_trans.specialization') }}</th>
                    <th>{{ trans('Dashboard_trans.date') }}</th>
                </tr>
            </thead>
            @foreach ($lastWorksTeachers as $teacher)
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->Name }}</td>
                        <td>{{ $teacher->genders->Name }}</td>
                        <td>{{ $teacher->Joining_Date }}</td>
                        <td>{{ $teacher->specializations->Name }}</td>
                        <td class="text-success">{{ $teacher->created_at }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</div>
