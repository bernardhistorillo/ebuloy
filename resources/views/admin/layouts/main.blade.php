<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>{{ config('app.name') }} Admin | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.css" />
    <link href="{{ url('lib/coreui/css/coreui.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/admin-style.css?v=' . config('custom.version')) }}" rel="stylesheet">
    <link rel="icon" href="{{ url("img/icon.png") }}" type="image/x-icon" />
</head>

<body class="c-app c-legacy-theme">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-md-down-none">
            <img src="{{ url('img/admin-ebuloy-lg.png') }}" class="c-sidebar-brand-full" width="100" />
            <img src="{{ url('img/admin-ebuloy-sm.png') }}" class="c-sidebar-brand-minimized" width="38" height="38" />
        </div>

        @include('admin.partials.sidebar')

        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
    </div>

    <div class="c-wrapper">
        <header class="c-header c-header-light c-header-fixed">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <i class="fas fa-bars c-icon c-icon-lg"></i>
            </button>
            <a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="#">
                <img src="{{ url('img/admin-ebuloy-lg.png') }}" width="100" />
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                <i class="fas fa-bars c-icon c-icon-lg"></i>
            </button>

            <ul class="c-header-nav mfs-auto">
                <li class="c-header-nav-item px-3 c-d-legacy-none">
                    <button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="" data-original-title="Toggle Light/Dark Mode">
                        <svg class="c-icon c-d-dark-none">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                        </svg>
                        <svg class="c-icon c-d-default-none">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
                        </svg>
                    </button>
                </li>
            </ul>

            <ul class="c-header-nav">
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar">
                            <i class="fas fa-user c-avatar-img"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2"><strong>Admin</strong></div>
                        <a class="dropdown-item" href="{{ route('admin.settings') }}">
                            <i class="fas fa-cog c-icon mfe-2"></i> Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">
                            <i class="fas fa-sign-out-alt c-icon mfe-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
            <div class="c-subheader justify-content-between px-3">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                    <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div>
        </header>
        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
        </div>
        <footer class="c-footer">
            <div><a href="#">{{ config('app.name') }}</a> © 2020</div>
        </footer>
    </div>

    @include('admin.partials.modals')

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('lib/coreui/js/coreui.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/admin-script.js?v=' . config('custom.version'))  }}"></script>

</body>
</html>
