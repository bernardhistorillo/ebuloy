@extends("layouts.layout")

@section("title")
Home
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
                    <a href="#page-1" class="btn c-btn c-btn-1 mb-3">How it works</a>
                    <button class="btn c-btn c-btn-2">Sign In</button>
                </div>

                <div class="text-center my-4 py-3">
                    <a href="https://facebook.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://instagram.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social"><i class="fab fa-twitter"></i></a>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <p class="testimonial">"Thanks ebuloy for making it possible."</p>
                            <p class="testimonial author">- anonymous 1</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial">"Thanks ebuloy for making it possible."</p>
                            <p class="testimonial author">- anonymous 2</p>
                        </div>
                        <div class="carousel-item">
                            <p class="testimonial">"Thanks ebuloy for making it possible."</p>
                            <p class="testimonial author">- anonymous 3</p>
                        </div>
                    </div>
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

                <div class="my-3 pt-3 pb-2">
                    <p class="pages-header">Create your Page</p>
                    <p class="pages-sub-header">Lorem ipsum dolor sit amet, consectetur adipicsing elit, sed diam nonummy nibh eu-ismod tincidunt ut</p>
                </div>

                <div>
                    <img src="{{ url("img/sample.png") }}" class="pages-img" />
                </div>

                <div class="text-center mt-5 my-4">
                    <div class="page-number active mr-3">1</div>
                    <a href="#page-2" class="page-number mr-3">2</a>
                    <a href="#page-2" class="page-number">3</a>
                </div>

                <div class="pt-3 px-3">
                    <a href="#page-2" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="page cached" data-name="page-2" data-order="3">
        <div class="wrapper">
            <div class="container">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-3 pb-2">
                    <p class="pages-header">Share your Page</p>
                    <p class="pages-sub-header">Lorem ipsum dolor sit amet, consectetur adipicsing elit, sed diam nonummy nibh eu-ismod tincidunt ut</p>
                </div>

                <div>
                    <img src="{{ url("img/sample.png") }}" class="pages-img" />
                </div>

                <div class="text-center mt-5 my-4">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number active mr-3">2</div>
                    <a href="#page-3" class="page-number">3</a>
                </div>

                <div class="pt-3 px-3">
                    <a href="#page-3" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="page cached" data-name="page-3" data-order="4">
        <div class="wrapper">
            <div class="container">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-3 pb-2">
                    <p class="pages-header">Withdraw Donations</p>
                    <p class="pages-sub-header">Lorem ipsum dolor sit amet, consectetur adipicsing elit, sed diam nonummy nibh eu-ismod tincidunt ut</p>
                </div>

                <div>
                    <img src="{{ url("img/sample.png") }}" class="pages-img" />
                </div>

                <div class="text-center mt-5 my-4">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number mr-3 go-back">2</div>
                    <div class="page-number active">3</div>
                </div>

                <div class="pt-3 px-3 active">
                    <a href="{{ route('signup') }}" class="btn c-btn c-btn-4 mb-3">Get Started</a>
                </div>
            </div>
        </div>
    </div>
@stop
