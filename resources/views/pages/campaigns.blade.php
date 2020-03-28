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

        <div class="card dashboard-card mt-4" id="public-campaigns-card">
            <div class="card-header px-2 mx-1 py-0 my-1">
                <table class="mb-1" id="public-memorial-campaigns-nav">
                    <tr>
                        <td class="width-32">
                            <img src="{{ url('img/nav-icons/dove-1.png') }}" class="w-100" />
                        </td>
                        <td>
                            <p>Public Memorial Campaigns</p>
                        </td>
                        <td class="width-32 text-right py-2 nav-link nav-link-search-campaign d-table-cell" data-toggle="tab" href="#nav-search" role="tab" aria-controls="nav-search" aria-selected="false">
                            <img src="{{ url('img/nav-icons/search-0.png') }}" id="search-inactive" class="w-100 mb-0" />
                            <img src="{{ url('img/nav-icons/search-1.png') }}" id="search-active" class="w-100 mb-0" />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-campaigns" role="tabpanel" aria-labelledby="nav-campaigns-tab">
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
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
                    <div class="card-body bg-white">
                        <div class="form-group form-group-2 mt-1 mb-2">
                            <input type="text" class="form-control" name="search_value" placeholder="Search" />
                        </div>

                        <div class="form-group form-group-2 mt-1 mb-2">
                            <select class="form-control" name="location">
                                <option>Location</option>
                                <option>Legazpi City</option>
                            </select>
                        </div>

                        <div class="filter-pills-container">
                            @foreach($tags as $tag)
                            <div class="filter-pills">
                                <span>{{ $tag }}</span>
                                <i class="fas fa-check"></i>
                            </div>
                            @endforeach
                        </div>

                        <p class="mt-4 nav-link nav-link-search-campaign" id="cancel-search" data-toggle="tab" href="#nav-campaigns" role="tab" aria-controls="nav-campaigns" aria-selected="true">
                            <span>Cancel Search</span>
                        </p>

                        <div class="pt-3 px-2">
                            <button class="btn c-btn c-btn-3 mb-3">Search<img src="{{ url('img/nav-icons/search-1.png') }}" id="search-icon" /></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@stop
