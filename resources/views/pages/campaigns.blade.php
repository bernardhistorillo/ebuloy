@extends("layouts.layout")

@section("title")
Home
@stop

@section("content")
    <div id="overlay"></div>
    <div id="loading" class="">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
    </div>

    @if($campaign)
        @include('partials.view-campaign')
    @else
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
                        <p class="pages-sub-header font-size-65 font-weight-bold d-none" id="searched-details">
                            <span class="d-none" id="searched-string-label">
                                <span class="text-persian-green">Searched:</span>
                                <span id="searched-string-value">Jose Rizal</span>
                            </span>
                            <span class="d-none" id="searched-location-label">
                                <span class="text-persian-green pl-2">Location:</span>
                                <span id="searched-location-value">Legazpi City</span>
                            </span>
                            <span class="d-none" id="searched-filters-label">
                                <span class="text-persian-green pl-2">Filters:</span>
                                <span id="searched-filters-value">Hero, Politician</span>
                            </span>
                        </p>

                        <p class="pages-sub-header font-size-80 font-weight-bold mt-5 d-none" id="no-results-found">No Results Found</p>

                        @foreach($campaigns as $campaign)
                        <a href="{{ route('campaigns', \Illuminate\Support\Facades\Crypt::encryptString($campaign['id'])) }}" class="text-decoration-none deceased-item-container">
                            <div class="deceased-item {{ ($campaign['is_draft'] == 1) ? 'draft' : '' }}">
                                <div class="search-filters d-none">{{ json_encode($campaign->search_filters()) }}</div>
                                <div class="location d-none">{{ $campaign['city'] }}</div>
                                <table class="w-100">
                                    <tr>
                                        <td class="width-40">
                                            <div class="image" style="background-image:url('{{ ($campaign->hasMedia('deceased_photos')) ? $campaign->getMedia('deceased_photos')->last()->getFullUrl() : url('img/default/deceased.png') }}')" class="w-100"></div>
                                        </td>
                                        <td class="pl-3">
                                            <p class="name mb-0">{{ $campaign['first_name'] . ' ' . $campaign['last_name'] }}</p>
                                            <div class="row no-gutters">
                                                <div class="col-12">
                                                    <span class="label">Location:</span> <span class="value">{{ $campaign['city'] }}</span>
                                                    <span class="label pl-2">Died:</span> <span class="value">{{ \Carbon\Carbon::parse($campaign['date_of_death'])->format('j M') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <p class="story">{{ $campaign['story'] }}</p>
                            </div>
                        </a>
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
                                <option value="">Location</option>
                                @foreach($locations as $location)
                                <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="filter-pills-container">
                            @foreach($search_filters as $search_filter)
                            <div class="filter-pills" data-id="{{ $search_filter['id'] }}">
                                <span class="filter-name">{{ $search_filter['name'] }}</span>
                                <i class="fas fa-check"></i>
                            </div>
                            @endforeach
                        </div>

                        <p class="mt-4 nav-link nav-link-search-campaign" id="cancel-search" data-toggle="tab" href="#nav-campaigns" role="tab" aria-controls="nav-campaigns" aria-selected="true">
                            <span>Cancel Search</span>
                        </p>

                        <div class="pt-3 px-2">
                            <button class="btn c-btn c-btn-3 mb-3" id="search-campaign">Search<img src="{{ url('img/nav-icons/search-1.png') }}" id="search-icon" /></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    @endif
@stop
