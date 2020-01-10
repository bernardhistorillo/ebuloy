@extends("layouts.layout")

@section("title")
<title>eBuloy</title>
@stop

@section("content")
    <div id="overlay"></div>

    <div class="page" data-name="home" data-order="1">
        <div class="bg-persian-green wrapper">
            <div class="container">
                <div class="text-center pt-4">
                    <img class="ebuloy-white-img" src="{{ url("img/ebuloy-white.png") }}" />
                </div>

                <div class="my-3 py-3">
                    <p class="brand-tag-line">eBuloy is better<br>than your sincerest<br>condolences.</p>
                </div>

                <div class="px-4">
                    <a href="#page-1" class="btn c-btn c-btn-primary mb-3">How it works</a>
                    <button class="btn c-btn c-btn-secondary">Sign In</button>
                </div>

                <div class="text-center my-4 py-3">
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social"><i class="fab fa-twitter"></i></a>
                </div>

                <div class="pt-2">
                    <p class="testimonial">"Thanks ebuloy for making it possible."</p>
                    <p class="testimonial author">- anonymous</p>
                </div>
            </div>
        </div>
    </div>

    <div class="page cached" data-name="page-1" data-order="2">
        <div class="wrapper">
            <div class="container">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-4 py-3">
                    <p class="pages-header">Create your Page</p>
                    <p class="pages-header">Lorem ipsum dolor sit amet, consectetur adipicsing elit, sed diam nonummy nibh eu-ismod tincidunt ut</p>
                </div>

                <div class="px-4">
                    <a href="#home" class="btn c-btn c-btn-primary mb-3">How it works</a>
                    <button class="btn c-btn c-btn-secondary">Sign In</button>
                </div>

                <div class="text-center my-5">
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn c-btn c-btn-secondary c-btn-social"><i class="fab fa-twitter"></i></a>
                </div>

                <div class="pt-3">
                    <p class="testimonial">"Thanks ebuloy for making it possible."</p>
                    <p class="testimonial author">- anonymous</p>
                </div>
            </div>
        </div>
    </div>
@stop
