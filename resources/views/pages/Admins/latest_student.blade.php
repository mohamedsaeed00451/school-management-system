<div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
    <div class="table-responsive mt-15">
        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
            <thead>
                <tr class="table-info text-danger">
                    <th>#</th>
                    <th>{{ trans('Students_trans.name') }}</th>
                    <th>{{ trans('Students_trans.email') }}</th>
                    <th>{{ trans('Students_trans.gender') }}</th>
                    <th>{{ trans('Students_trans.Grade') }}</th>
                    <th>{{ trans('Students_trans.classrooms') }}</th>
                    <th>{{ trans('Students_trans.section') }}</th>
                    <th>{{ trans('Dashboard_trans.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lastWorksStudents as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->Name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender->Name }}</td>
                        <td>{{ $student->grade->Name }}</td>
                        <td>{{ $student->classroom->Name_Class }}</td>
                        <td>{{ $student->section->Name_Section }}</td>
                        <td class="text-success">{{ $student->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
