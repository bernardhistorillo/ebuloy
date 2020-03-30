@extends("layouts.layout")

@section("title")
Sign Up
@stop

@section("content")
    <div id="overlay"></div>

    <div class="wrapper">
        <div class="container">
            <div class="text-center pt-4">
                <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
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
@stop
