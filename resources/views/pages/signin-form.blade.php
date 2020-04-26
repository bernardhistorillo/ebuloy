@extends("layouts.layout")

@section("title")
Sign In Form
@stop

@section("content")
    <div class="wrapper">
        @include('partials.sidebar')

        <div id="content" class="p-0">
            <div id="overlay"></div>
            <div id="loading" class="">
                <i class="fas fa-spinner fa-spin fa-3x"></i>
            </div>

            <div class="wrapper-2">
                <div class="container px-2">
                    <div class="position-relative text-center pt-4">
                        <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                        <div id="menu-bar">
                            <i class="fas fa-bars text-persian-green sidebarCollapse"></i>
                        </div>
                    </div>

                    <div class="mt-5 mb-1 pt-3 pb-2">
                        <p class="pages-header">Sign In Your<br>New Account</p>
                    </div>

                    <form id="signin-form">
                        <div class="pt-3">
                            <div class="form-group mb-2">
                                <p>Email Address</p>
                                <input type="email" class="form-control" name="email_address" placeholder="hello@domain.com" />
                            </div>
                            <div class="form-group mb-2">
                                <p>Password</p>
                                <input type="password" class="form-control" name="password" placeholder="******" />
                            </div>
                        </div>

                        <div class="pt-5 mt-5 px-4">
                            <button type="submit" class="btn c-btn c-btn-3 mb-3">Sign In<i class="fas fa-chevron-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="overlay"></div>
    </div>

    <div class="d-none" id="route-signin-submit-form">{{ route('signin.submit-form') }}</div>
@stop
