@extends("layouts.layout")

@section("title")
Sign In
@stop

@section("content")
    <div class="wrapper">
        @include('partials.sidebar')

        <div id="content" class="p-0">
            <div id="overlay"></div>

            <div class="wrapper-2">
                <div class="container">
                    <div class="position-relative text-center pt-4">
                        <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                        <div id="menu-bar">
                            <i class="fas fa-bars text-persian-green sidebarCollapse"></i>
                        </div>
                    </div>

                    <div class="mt-5 mb-1 pt-3 pb-2">
                        <p class="pages-header">Sign In Your<br>Account</p>
                    </div>

                    <div class="pt-3 px-2">
                        <a href="{{ route('auth.facebook') }}" class="btn c-btn c-btn-5 mb-3">Facebook</a>
                        <a href="{{ route('auth.google') }}" class="btn c-btn c-btn-6 mb-3">Google</a>
                        <a href="{{ route('signin.form') }}" class="btn c-btn c-btn-3 mb-3">Email</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay"></div>
    </div>
@stop
