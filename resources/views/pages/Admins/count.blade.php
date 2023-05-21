<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-success">
                            <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{ trans('Dashboard_trans.num_students') }}</p>
                        <h4>{{ $students }}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Students.index') }}"
                        target="_blank"><span class="text-danger">{{ trans('Dashboard_trans.show_data') }}</span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-warning">
                            <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{ trans('Dashboard_trans.num_teachers') }}</p>
                        <h4>{{ $teachers }}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Teachers.index') }}"
                        target="_blank"><span class="text-danger">{{ trans('Dashboard_trans.show_data') }}</span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-success">
                            <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{ trans('Dashboard_trans.num_parents') }}</p>
                        <h4>{{ $parents }}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Parents') }}"
                        target="_blank"><span class="text-danger">{{ trans('Dashboard_trans.show_data') }}</span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <span class="text-primary">
                            <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="float-right text-right">
                        <p class="card-text text-dark">{{ trans('Dashboard_trans.num_sections') }}</p>
                        <h4>{{ $sections }}</h4>
                    </div>
                </div>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('Sections.index') }}"
                        target="_blank"><span class="text-danger">{{ trans('Dashboard_trans.show_data') }}</span></a>
                </p>
            </div>
        </div>
    </div>
</div>
