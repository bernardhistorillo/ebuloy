<nav id="sidebar" class="bg-white">
    <div class="sidebar-header">
        <div class="text-center">
            <img class="ebuloy-persian-green-img width-60" src="{{ url("img/ebuloy-white-3.png") }}" />
        </div>

        <div class="px-4 mt-3">
            <a href="{{ route('about') }}" id="preview-campaign" class="btn c-btn c-btn-1">About eBuloy</a>
        </div>
    </div>

    <ul class="list-unstyled components py-0">
        <p class="gotham text-center font-size-90 bg-color-1 text-color-3 px-4 py-3 mb-0">eBuloy is better<br>than your sincerest condolences.</p>
        <li class="{{ (\Request::route()->getName() == "home") ? "active" : "" }}">
            <a href="{{ route('home') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-home"></i>
                </div>
                <div>Home</div>
            </a>
        </li>
        @if(Auth::check())
        <li class="{{ (\Request::route()->getName() == "dashboard") ? "active" : "" }}">
            <a href="{{ route('dashboard') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                <div>My Dashboard</div>
            </a>
        </li>
        @endif
        <li class="{{ (\Request::route()->getName() == "campaigns") ? "active" : "" }}">
            <a href="{{ route('campaigns') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-users"></i>
                </div>
                <div>Public Campaigns</div>
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == "create-campaign") ? "active" : "" }}">
            <a href="{{ route('create-campaign') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-dove"></i>
                </div>
                <div>Start A Campaign</div>
            </a>
        </li>
        @if(!Auth::check())
        <li class="{{ (in_array(\Request::route()->getName(), ['signin', 'signin.form'])) ? "active" : "" }}">
            <a href="{{ route('signin') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-sign-in-alt"></i>
                </div>
                <div>Sign In</div>
            </a>
        </li>
        <li class="{{ (\Request::route()->getName() == "signup") ? "active" : "" }}">
            <a href="{{ route('signup') }}" class="gotham d-flex">
                <div class="width-30 text-center mr-2">
                    <i class="fas fa-address-card"></i>
                </div>
                <div>Sign Up</div>
            </a>
        </li>
        @endif
    </ul>

    @if(Auth::check())
    <div class="px-4 mt-4">
        <a href="{{ route('logout') }}" id="preview-campaign" class="btn c-btn c-btn-3 mb-3">Log Out<i class="fas fa-sign-out-alt"></i></a>
    </div>
    @endif

</nav>
