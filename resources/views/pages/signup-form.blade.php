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
                <p class="pages-header">Sign Up A<br>New Account</p>
            </div>

            <form id="signup-form">
                <input type="text" class="form-control d-none" name="id" />

                <div class="pt-3">
                    <div class="form-group mb-2">
                        <p>First Name</p>
                        <input type="text" class="form-control" name="first_name" placeholder="Juan" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Last Name</p>
                        <input type="text" class="form-control" name="last_name" placeholder="De La Cruz" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Mobile Number</p>
                        <input type="text" class="form-control" name="mobile_number" placeholder="+63" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Email Address</p>
                        <input type="email" class="form-control" name="email_address" placeholder="hello@domain.com" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Password</p>
                        <input type="password" class="form-control" name="password" placeholder="******" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Confirm Password</p>
                        <input type="password" class="form-control" name="confirm_password" placeholder="******" />
                    </div>
                </div>

                <div class="pt-5 px-4">
                    <button type="submit" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="d-none" id="route-signup-submit-form">{{ route('signup.submit-form') }}</div>
    <div class="d-none" id="route-campaign">{{ route('home') }}</div>
@stop
