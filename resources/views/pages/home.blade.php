@extends("layouts.layout")

@section("title")
Home
@stop

@section("content")
    <div class="wrapper">
        @include('partials.sidebar')

        <div id="content" class="p-0">
            <div id="overlay"></div>

            <div class="page" data-name="home" data-order="1">
                <div class="bg-persian-green wrapper-2 position-relative">
                    <div class="text-center position-absolute" style="bottom:0; width:calc(100% - 32px)">
                        <img id="nurse-kid-image" src="{{ url('img/nurse-kid.png') }}" />
                    </div>

                    <div class="container">
                        <div class="position-relative text-center pt-4">
                            <img class="ebuloy-white-img-2 home-ebuloy-white-img-2" src="{{ url("img/ebuloy-white-2.png") }}" />
                            <div id="menu-bar">
                                <i class="fas fa-bars text-white sidebarCollapse"></i>
                            </div>
                        </div>

                        <div class="mt-4 mb-5 py-3">
                            <p class="brand-tag-line">They took care of our families.<br>Now we take care of theirs.</p>
                        </div>
                    </div>

                    <div class="position-absolute" style="bottom:20px; width:calc(100% - 32px)">
                        <div class="text-center mb-4 pb-2">
                            <a href="https://facebook.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://instagram.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social"><i class="fab fa-twitter"></i></a>
                        </div>

                        <div class="px-4">
                            <a href="{{ route('campaigns') }}" class="btn c-btn c-btn-2 mb-3">Send eBuloy</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white wrapper-2 min-height-initial">
                    <div class="container">
                        <div class="my-3 pt-3 pb-2 px-3">
                            <p class="pages-header font-weight-bold text-stroke-1">About eBuloy</p>

                            <p class="text-persian-green font-size-90 text-center gotham text-stroke-3 mt-4 pt-3">Our Vision</p>
                            <p class="pages-sub-header font-weight-bold">We want to modernize the Filipino family tradition of abuloy through technology and connectivity.</p>

                            <p class="text-persian-green font-size-90 text-center gotham text-stroke-3 mt-4 pt-3">Our Mission</p>
                            <p class="pages-sub-header font-weight-bold">To educate people in the importance of continuing the abuloy tradition through mobile technology.</p>
                            <p class="pages-sub-header font-weight-bold">To simplify giving abuloy to families who need it the most.</p>
                            <p class="pages-sub-header font-weight-bold">To expand and improve access to financial support for families in their time of grief.</p>
                        </div>

                        <div class="px-4 my-4">
                            <a href="#page-1" class="btn c-btn c-btn-3 mb-3">How it works</a>
                            <a href="{{ route('signin') }}" class="btn c-btn c-btn-1">Sign In</a>
                        </div>
                    </div>
                </div>

                <div class="bg-color-1 wrapper-2 min-height-initial">
                    <div class="container">
                        <div class="my-3 pt-3 pb-2 px-3">
                            <p class="pages-header font-weight-bold text-stroke-1">Give &amp; Celebrate<br>A Life</p>
                        </div>

                        <div class="row">
                            <div class="col-6 px-2 mb-3">
                                <div class="deceased-item-card">
                                    <div class="text-center">
                                        <div class="deceased-photo" style="background-image:url('{{ url('img/default/deceased.png') }}')"></div>
                                    </div>

                                    <p class="gotham text-center text-color-1 font-size-70 font-weight-bold line-height-140 my-2">Name of Deceased</p>

                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Location:</span> <span class="text-persian-green">Legazpi City</span></p>
                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Died:</span> <span class="text-persian-green">24 Nov</span></p>

                                    <p class="story text-stroke-1 text-color-1 font-size-60 line-height-140 mt-2 mb-0">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>

                            <div class="col-6 px-2 mb-3">
                                <div class="deceased-item-card">
                                    <div class="text-center">
                                        <div class="deceased-photo" style="background-image:url('{{ url('img/default/deceased.png') }}')"></div>
                                    </div>

                                    <p class="gotham text-center text-color-1 font-size-70 font-weight-bold line-height-140 my-2">Name of Deceased</p>

                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Location:</span> <span class="text-persian-green">Legazpi City</span></p>
                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Died:</span> <span class="text-persian-green">24 Nov</span></p>

                                    <p class="story text-stroke-1 text-color-1 font-size-60 line-height-140 mt-2 mb-0">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>

                            <div class="col-6 px-2 mb-3">
                                <div class="deceased-item-card">
                                    <div class="text-center">
                                        <div class="deceased-photo" style="background-image:url('{{ url('img/default/deceased.png') }}')"></div>
                                    </div>

                                    <p class="gotham text-center text-color-1 font-size-70 font-weight-bold line-height-140 my-2">Name of Deceased</p>

                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Location:</span> <span class="text-persian-green">Legazpi City</span></p>
                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Died:</span> <span class="text-persian-green">24 Nov</span></p>

                                    <p class="story text-stroke-1 text-color-1 font-size-60 line-height-140 mt-2 mb-0">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>

                            <div class="col-6 px-2 mb-3">
                                <div class="deceased-item-card">
                                    <div class="text-center">
                                        <div class="deceased-photo" style="background-image:url('{{ url('img/default/deceased.png') }}')"></div>
                                    </div>

                                    <p class="gotham text-center text-color-1 font-size-70 font-weight-bold line-height-140 my-2">Name of Deceased</p>

                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Location:</span> <span class="text-persian-green">Legazpi City</span></p>
                                    <p class="gotham-thin font-weight-bold text-stroke text-center text-color-1 font-size-60 line-height-140 mb-0"><span class="text-stroke-1">Died:</span> <span class="text-persian-green">24 Nov</span></p>

                                    <p class="story text-stroke-1 text-color-1 font-size-60 line-height-140 mt-2 mb-0">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center my-4">
                            <a href="{{ route('campaigns') }}" class="gotham text-color-1 font-weight-bold font-size-90">
                                View More Campaigns<br>
                                <i class="fas fa-chevron-down text-color-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-persian-green wrapper-2 min-height-initial">
                    <div class="container">
                        <div class="text-center pt-3">
                            <img class="ebuloy-white-img-2 home-ebuloy-white-img-2" src="{{ url("img/ebuloy-white-2.png") }}" />
                        </div>

                        <div class="text-center pt-1 my-4 pb-2">
                            <a href="https://facebook.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://instagram.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social"><i class="fab fa-twitter"></i></a>
                        </div>

                        <div class="text-center mb-4">
                            <p class="gotham text-white font-size-60 mb-0">&copy; eBuloy 2020 Legazpi City, All rights reserved.</p>
                            <p class="gotham text-white font-size-60 mb-0">Terms &amp; Policy</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page cached" data-name="page-1" data-order="2">
                <div class="wrapper-2">
                    <div class="container">
                        <div class="position-relative text-center pt-4">
                            <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                            <div id="menu-bar">
                                <i class="fas fa-bars text-persian-green sidebarCollapse"></i>
                            </div>
                        </div>

                        <div class="my-3 pt-3 pb-2">
                            <p class="pages-header">Create Your Campaign</p>
                            <p class="pages-sub-header">Use eBuloy's campaign creator to set all the needed details for your online abuloy crowdfunding.</p>
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
                <div class="wrapper-2">
                    <div class="container">
                        <div class="position-relative text-center pt-4">
                            <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                            <div id="menu-bar">
                                <i class="fas fa-bars text-persian-green sidebarCollapse"></i>
                            </div>
                        </div>

                        <div class="my-3 pt-3 pb-2">
                            <p class="pages-header">Share Your Campaign</p>
                            <p class="pages-sub-header">Share your created eBuloy campaign over social media and/or email and encourage your family and friends to help gather funds.</p>
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
                <div class="wrapper-2">
                    <div class="container">
                        <div class="position-relative text-center pt-4">
                            <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                            <div id="menu-bar">
                                <i class="fas fa-bars text-persian-green sidebarCollapse"></i>
                            </div>
                        </div>

                        <div class="my-3 pt-3 pb-2">
                            <p class="pages-header">Collect Your Funds</p>
                            <p class="pages-sub-header">Claim the funds you raised in your campaign for your family or for the recipient family you created the eBuloy campaign for.</p>
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
        </div>

        <div class="overlay"></div>
    </div>
@stop
