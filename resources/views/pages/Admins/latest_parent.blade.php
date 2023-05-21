<div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
    <div class="table-responsive mt-15">
        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
            <thead>
                <tr class="table-info text-danger">
                    <th>#</th>
                    <th>{{ trans('Students_trans.name') }}</th>
                    <th>{{ trans('Students_trans.email') }}</th>
                    <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
                    <th>{{ trans('Parent_trans.Phone_Father') }}</th>
                    <th>{{ trans('Dashboard_trans.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lastWorksParents as $parent)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $parent->Name_Father }}</td>
                        <td>{{ $parent->email }}</td>
                        <td>{{ $parent->National_ID_Father }}</td>
                        <td>{{ $parent->Phone_Father }}</td>
                        <td class="text-success">{{ $parent->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
