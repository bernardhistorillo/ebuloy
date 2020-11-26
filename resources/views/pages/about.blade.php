@extends("layouts.layout")

@section("title")
About
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

                    <div class="my-3 pt-3 pb-2 px-3">
                        <p class="pages-header font-weight-bold text-stroke-1">About eBuloy</p>

                        <p class="text-persian-green font-size-90 text-center gotham text-stroke-3 mt-4 pt-3">Our Vision</p>
                        <p class="pages-sub-header font-weight-bold">We want to modernize the Filipino family tradition of abuloy through technology and connectivity.</p>

                        <p class="text-persian-green font-size-90 text-center gotham text-stroke-3 mt-4 pt-3">Our Mission</p>
                        <p class="pages-sub-header font-weight-bold">To educate people in the importance of continuing the abuloy tradition through mobile technology.</p>
                        <p class="pages-sub-header font-weight-bold">To simplify giving abuloy to families who need it the most.</p>
                        <p class="pages-sub-header font-weight-bold">To expand and improve access to financial support for families in their time of grief.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay"></div>
    </div>
@stop
