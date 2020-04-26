@extends("admin.layouts.main")

@section("title")
    Dashboard
@stop

@section('breadcrumbs')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@stop

@section("content")
    <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-gradient-primary p-3 mfe-3">
                        <i class="fas fa-calendar-check c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{ number_format($active_campaigns_count,0) }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Active Campaigns</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-gradient-info p-3 mfe-3">
                        <i class="fas fa-donate c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-info">{{ number_format($donations_to_be_verified_count,0) }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Donations to be Verified</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="bg-gradient-warning p-3 mfe-3">
                        <i class="fas fa-users c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-warning">{{ number_format($users_count,0) }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total Accounts</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
