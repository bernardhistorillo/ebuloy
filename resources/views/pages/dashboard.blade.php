@extends("layouts.layout")

@section("title")
Home
@stop

@section("content")
    <div id="overlay"></div>

    <div class="bg-persian-green wrapper">
        <div class="text-center pt-4">
            <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-white.png") }}" />
        </div>

        <div class="card dashboard-card mt-4">
            <div class="card-header px-1">
                <ul class="nav nav-pills">
                    <li class="nav-item col-3">
                        <a class="nav-link active" data-toggle="tab" href="#nav-campaign" role="tab" aria-controls="nav-campaign" aria-selected="true">
                            <img src="{{ url('img/nav-icons/dove-1.png') }}" class="active" />
                            <img src="{{ url('img/nav-icons/dove-0.png') }}" class="inactive" />
                            <div>Campaign</div>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-toggle="tab" href="#nav-donations" role="tab" aria-controls="nav-donations" aria-selected="false">
                            <img src="{{ url('img/nav-icons/heart-1.png') }}" class="active" />
                            <img src="{{ url('img/nav-icons/heart-0.png') }}" class="inactive" />
                            <div>Donations</div>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="false">
                            <img src="{{ url('img/nav-icons/user-1.png') }}" class="active" />
                            <img src="{{ url('img/nav-icons/user-0.png') }}" class="inactive" />
                            <div>Account</div>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">
                            <img src="{{ url('img/nav-icons/cog-1.png') }}" class="active" />
                            <img src="{{ url('img/nav-icons/cog-0.png') }}" class="inactive" />
                            <div>Settings</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-campaign" role="tabpanel" aria-labelledby="nav-campaign-tab">
                        <p class="my-5 py-5 text-center">Campaign</p>
                    </div>
                    <div class="tab-pane fade" id="nav-donations" role="tabpanel" aria-labelledby="nav-donations-tab">
                        <p class="my-5 py-5 text-center">Donations</p>
                    </div>
                    <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                        <p class="my-5 py-5 text-center">Account</p>
                    </div>
                    <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                        <p class="my-5 py-5 text-center">Settings</p>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@stop
