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

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-campaign" role="tabpanel" aria-labelledby="nav-campaign-tab">
                    <div class="card-body">
                        @foreach(Auth::user()->campaigns() as $campaign)
                        <div class="deceased-item {{ ($campaign['is_draft'] == 1) ? 'draft' : '' }}" data-draft-link="{{ ($campaign['is_draft'] == 1) ? route('create-campaign', \Illuminate\Support\Facades\Crypt::encryptString($campaign['id'])) : '' }}">
                            <table class="w-100">
                                <tr>
                                    <td class="width-40">
                                        <div class="image" style="background-image:url('{{ ($campaign->hasMedia('deceased_photos')) ? $campaign->getMedia('deceased_photos')->last()->getFullUrl() : url('img/default/deceased.png') }}')" class="w-100"></div>
                                    </td>
                                    <td class="pl-3">
                                        <p class="name mb-0">{{ ($campaign['first_name']) ? $campaign['first_name'] : '----------' }} {{ ($campaign['last_name']) ? $campaign['last_name'] : '----------' }}</p>
                                        <div class="row no-gutters">
                                            <div class="col-4">
                                                <span class="label {{ ($campaign['is_draft'] == 1) ? 'disabled' : '' }}">End:</span> <span class="value {{ ($campaign['is_draft'] == 1) ? 'disabled' : '' }}">{{ ($campaign['end_of_campaign']) ? \Carbon\Carbon::parse($campaign['end_of_campaign'])->format('j M') : '-- ---' }}</span>
                                            </div>
                                            <div class="col-8">
                                                <span class="label {{ ($campaign['is_draft'] == 1) ? 'disabled' : '' }}">Donations:</span> <span class="value {{ ($campaign['is_draft'] == 1) ? 'disabled' : '' }}">{{ ($campaign['is_draft'] == 1) ? 0 : 0 }}</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="status {{ ($campaign['is_draft'] == 0) ? 'active' : '' }}">{{ ($campaign['is_draft'] == 1) ? 'DRAFT' : 'ACTIVE' }}</div>
                        </div>
                        @endforeach

                        <a href="{{ route('create-campaign') }}" id="add-campaign-button">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-donations" role="tabpanel" aria-labelledby="nav-donations-tab">
                    <p class="my-5 py-5 text-center">Donations</p>
                </div>

                <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                    <div class="px-3 pt-2 pb-3">
                        <div class="row">
                            <div class="col-8">
                                <p class="label mb-0">ACCOUNT INFORMATION</p>
                            </div>
                            <div class="col-4">
                                <p class="account-edit-text mb-0">EDIT</p>
                            </div>
                        </div>

                        <table class="w-100 mt-3">
                            <tr>
                                <td class="width-85"><img src="{{ (Auth::user()->hasMedia('display_photos')) ? Auth::user()->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png')  }}" class="w-100 account-display-photo" /></td>
                                <td class="pl-3 account-details">
                                    <p class="font-weight-bold">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                                    <p>{{ Auth::user()->mobile_number }}</p>
                                    <p class="mb-0">{{ Auth::user()->email_address }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div id="earned-donations-container" class="px-3 py-3">
                        <p class="label mb-0">EARNED DONATIONS</p>
                        <div class="row mt-3 px-2">
                            <div class="col-4 px-2">
                                <div class="earned-donations">
                                    <div>
                                        <p class="amount">2,000</p>
                                        <p class="method">GCASH</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-2">
                                <div class="earned-donations">
                                    <div>
                                        <p class="amount">5,000</p>
                                        <p class="method">PAYPAL</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 px-2">
                                <div class="earned-donations total">
                                    <div>
                                        <p class="amount">7,000</p>
                                        <p class="method">TOTAL</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bank-account-information-container" class="px-3 py-3">
                        <div class="row">
                            <div class="col-8">
                                <p class="label mb-0">BANK ACCOUNT INFORMATION</p>
                            </div>
                            <div class="col-4">
                                <p class="account-edit-text mb-0">EDIT</p>
                            </div>
                        </div>

                        <table class="mt-3 w-100">
                            <tr>
                                <td class="width-85">Bank Name</td>
                                <td>BDO UNIBANK</td>
                            </tr>
                            <tr>
                                <td>Account No.</td>
                                <td>**** **** **** 1234</td>
                            </tr><tr>
                                <td>Account Name</td>
                                <td>Ismael Jerusalem</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                    <p class="my-5 py-5 text-center">Settings</p>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@stop
