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
                        <a href="{{ route('create-campaign', \Illuminate\Support\Facades\Crypt::encryptString($campaign['id'])) }}" class="text-decoration-none">
                            <div class="deceased-item {{ ($campaign['is_draft'] == 1) ? 'draft' : '' }}">
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
                        </a>
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
                    <div id="account-content">
                        @include('partials.account-content')
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                    <p class="my-5 py-5 text-center">Settings</p>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-account" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header bg-color-7 text-white">
                    <h5 class="modal-title">Edit Account</h5>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @include('partials.edit-account-modal-content')
                </div>
                <div class="modal-footer">
                    <button class="btn c-btn c-btn-7" data-dismiss="modal">Cancel</button>
                    <button class="btn c-btn c-btn-4 width-initial px-4" id="edit-account">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-edit-account">{{ route('dashboard.edit-account') }}</div>
@stop
