<div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
    <div class="table-responsive mt-15">
        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
            <thead>
                <tr class="table-info text-danger">
                    <th>#</th>
                    <th>{{ trans('Students_trans.name') }}</th>
                    <th>{{ trans('Students_trans.Grade') }}</th>
                    <th>{{ trans('Students_trans.classrooms') }}</th>
                    <th>{{ trans('Expenses_trans.amount') }}</th>
                    <th>{{ trans('Expenses_trans.notes') }}</th>
                    <th>{{ trans('Dashboard_trans.date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lastWorksParentsFeeInvoice as $section)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $section->student->Name }}</td>
                        <td>{{ $section->grade->Name }}</td>
                        <td>{{ $section->classroom->Name_Class }}</td>
                        <td>{{ $section->Amount }}</td>
                        <td>{{ $section->Notes }}</td>
                        <td class="text-success">{{ $section->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
