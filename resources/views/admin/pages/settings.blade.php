@extends("admin.layouts.main")

@section("title")
    Settings
@stop

@section('breadcrumbs')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item active">Settings</li>
    </ol>
@stop

@section("content")
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Change Password</div>
                <form id="change-password-form">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="current_password" placeholder="Current Password" required />
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="new_password" placeholder="New Password" required />
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" required />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit"> Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-admin-change-password">{{ route('admin.settings.change-password') }}</div>
@stop
