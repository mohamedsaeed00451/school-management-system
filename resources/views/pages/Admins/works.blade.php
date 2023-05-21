<div class="row">
    <div style="height: 400px;" class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="tab nav-border" style="position: relative;">
                    <div class="d-block d-md-flex justify-content-between">

                        <div class="d-block w-100">
                            <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                {{ trans('Dashboard_trans.last_operations') }}
                            </h5>
                        </div>

                        <div class="d-block d-md-flex nav-tabs-custom">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active show" id="students-tab" data-toggle="tab" href="#students"
                                        role="tab" aria-controls="students" aria-selected="true">
                                        {{ trans('Dashboard_trans.num_students') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                        role="tab" aria-controls="teachers"
                                        aria-selected="false">{{ trans('Dashboard_trans.num_teachers') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                        role="tab" aria-controls="parents"
                                        aria-selected="false">{{ trans('Dashboard_trans.num_parents') }}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                        role="tab" aria-controls="fee_invoices"
                                        aria-selected="false">{{ trans('Dashboard_trans.invoices') }}
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">

                        {{-- students Table --}}
                        @include('pages.Admins.latest_student')

                        {{-- teachers Table --}}
                        @include('pages.Admins.latest_teacher')

                        {{-- parents Table --}}
                        @include('pages.Admins.latest_parent')

                        {{-- Fee Table --}}
                        @include('pages.Admins.latest_invoices')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
