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
                        <div class="deceased-item">
                            <table class="w-100">
                                <tr>
                                    <td class="width-50"><img src="{{ url('img/deceased.png') }}" class="w-100" /></td>
                                    <td class="pl-3">
                                        <p class="name mb-0">Name of deceased</p>
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <span class="label">End:</span> <span class="value">24 Nov</span>
                                            </div>
                                            <div class="col-8">
                                                <span class="label">Donations:</span> <span class="value">55</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="status active">ACTIVE</div>
                        </div>

                        <div class="deceased-item">
                            <table class="w-100">
                                <tr>
                                    <td class="width-50"><img src="{{ url('img/deceased.png') }}" class="w-100" /></td>
                                    <td class="pl-3">
                                        <p class="name mb-0">Name of deceased</p>
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <span class="label disabled">End:</span> <span class="value disabled">24 Nov</span>
                                            </div>
                                            <div class="col-8">
                                                <span class="label disabled">Donations:</span> <span class="value disabled">55</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="status">DRAFT</div>
                        </div>

                        <a href="{{ route('create-campaign') }}" id="add-campaign-button">
                            <i class="fas fa-plus"></i>
                        </a>
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
