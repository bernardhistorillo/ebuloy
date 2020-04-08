@extends("layouts.layout")

@section("title")
Sign Up Form
@stop

@section("content")
    <div id="overlay"></div>
    <div id="loading" class="">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
    </div>

    <div class="wrapper">
        <div class="container px-2">
            <div class="text-center pt-4">
                <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
            </div>

            <div class="mt-3 mb-1 pt-3">
                @if(Auth::check())
                <p class="pages-header">Complete Your<br>Information</p>
                @else
                <p class="pages-header">Sign Up A<br>New Account</p>
                @endif
            </div>

            <form id="signup-form">
                <div class="pt-3">
                    <div class="form-group mb-2">
                        <p class="{{ (Auth::check() && Auth::user()->first_name) ? 'disabled' : '' }}">First Name</p>
                        <input type="text" class="form-control" name="first_name" placeholder="Juan" value="{{ (Auth::check() && Auth::user()->first_name) ? Auth::user()->first_name : '' }}" {{ (Auth::check() && Auth::user()->first_name) ? 'disabled' : '' }} />
                        @if(Auth::check() && Auth::user()->first_name)
                        <i class="fas fa-check-circle"></i>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <p class="{{ (Auth::check() && Auth::user()->last_name) ? 'disabled' : '' }}">Last Name</p>
                        <input type="text" class="form-control" name="last_name" placeholder="De La Cruz" value="{{ (Auth::check() && Auth::user()->last_name) ? Auth::user()->last_name : '' }}" {{ (Auth::check() && Auth::user()->last_name) ? 'disabled' : '' }} />
                        @if(Auth::check() && Auth::user()->last_name)
                        <i class="fas fa-check-circle"></i>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <p class="{{ (Auth::check() && Auth::user()->mobile_number) ? 'disabled' : '' }}">Mobile Number</p>
                        <input type="text" class="form-control" name="mobile_number" placeholder="+63" value="{{ (Auth::check() && Auth::user()->mobile_number) ? Auth::user()->mobile_number : '' }}" {{ (Auth::check() && Auth::user()->mobile_number) ? 'disabled' : '' }} />
                        @if(Auth::check() && Auth::user()->mobile_number)
                        <i class="fas fa-check-circle"></i>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <p class="{{ (Auth::check() && Auth::user()->email_address) ? 'disabled' : '' }}">Email Address</p>
                        <input type="email" class="form-control" name="email_address" placeholder="hello@domain.com" value="{{ (Auth::check() && Auth::user()->email_address) ? Auth::user()->email_address : '' }}" {{ (Auth::check() && Auth::user()->email_address) ? 'disabled' : '' }} />
                        @if(Auth::check() && Auth::user()->email_address)
                        <i class="fas fa-check-circle"></i>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <p class="{{ (Auth::check() && Auth::user()->address) ? 'disabled' : '' }}">Address</p>
                        <input type="text" class="form-control" name="address" placeholder="123 Street, Legazpi City, Albay" value="{{ (Auth::check() && Auth::user()->address) ? Auth::user()->address : '' }}" {{ (Auth::check() && Auth::user()->address) ? 'disabled' : '' }} />
                        @if(Auth::check() && Auth::user()->address)
                        <i class="fas fa-check-circle"></i>
                        @endif
                    </div>
                    @if(!Auth::check())
                    <div class="form-group mb-2">
                        <p>Password</p>
                        <input type="password" class="form-control" name="password" placeholder="******" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Confirm Password</p>
                        <input type="password" class="form-control" name="confirm_password" placeholder="******" />
                    </div>
                    @endif
                </div>

                <div class="pt-5 {{ (Auth::check()) ? 'mt-4' : '' }} px-4">
                    <button type="submit" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-none" id="route-signup-submit-form">{{ route('signup.submit-form') }}</div>
    <div class="d-none" id="route-dashboard">{{ route('dashboard') }}</div>
@stop
