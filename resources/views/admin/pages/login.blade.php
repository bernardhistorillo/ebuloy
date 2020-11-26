<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }} Admin | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.css" />
    <link href="{{ url('lib/coreui/css/coreui.min.css') }}" rel="stylesheet">
    <link href="{{ mix('css/admin-all.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ url("img/icon.png") }}" type="image/x-icon" />
</head>

<body class="c-app c-legacy-theme flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>

                            <form id="signin-form">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user c-icon"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="text" name="username" placeholder="Username" required />
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock c-icon"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="password" name="password" placeholder="Password" required />
                                </div>
                                <button class="btn btn-primary px-4" id="signin-button" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.modals')

    <div class="d-none" id="route-submit-login">{{ route('admin.submit-login') }}</div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('lib/coreui/js/coreui.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/admin-all.js')  }}"></script>

</body>
</html>
