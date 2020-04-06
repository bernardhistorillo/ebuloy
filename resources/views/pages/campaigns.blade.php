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
    <div class="page" data-name="home" data-order="1">
        @include('partials.view-campaign')
    </div>

    <div class="page cached" data-name="page-2" data-order="2">
        <div class="bg-persian-green wrapper">
            <div class="text-center pt-4">
                <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-white.png") }}" />
            </div>

            <div class="card dashboard-card mt-4">
                <div class="p-3 border-bottom-color-1">
                    <p class="gotham text-center text-color-1 font-size-75 font-weight-bold mt-2 mb-0">Amount</p>
                    <div class="donation-amount-container">
                        <span>Php</span>
                        <input type="number" class="form-control" name="amount" placeholder="0.00" min="0" />
                    </div>

                    <div class="px-4 pt-3">
                        <p class="gotham text-color-1 font-size-65 text-center line-height-190 mb-0">The Good Will has a 1% platform fee for organizers to operate our service.</p>
                    </div>
                </div>

                <div class="p-3">
                    @if(Auth::check())
                    <div class="text-center pl-2 mt-1 mb-2">
                        <div class="custom-control custom-radio custom-control-inline d-inline-block">
                            <input type="radio" id="donor-info-0" name="donor-info" value="account" class="custom-control-input" checked />
                            <label class="custom-control-label gotham text-color-1 font-weight-bold font-size-80 line-height-195 cursor-pointer" for="donor-info-0">Use your profile for this donation</label>
                        </div>
                    </div>

                    <div class="donation-my-profile-container donor-option-content mb-3" data-option="account">
                        <table class="w-100">
                            <tr>
                                <td>
                                    <div class="photo" style="background-image:url('{{ (Auth::user()->hasMedia('display_photos')) ? Auth::user()->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png') }}')"></div>
                                </td>
                                <td class="pl-3">
                                    <p class="gotham text-color-1 font-weight-bold font-size-80 mb-0">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                                    <p class="gotham text-color-1 font-size-80 mb-0">Barriada, Legazpi City</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    @endif

                    <div class="text-center pl-2 mt-1 mb-2">
                        <div class="custom-control custom-radio custom-control-inline d-inline-block">
                            <input type="radio" id="donor-info-1" name="donor-info" value="input" class="custom-control-input" {{ (!Auth::check()) ? 'checked' : '' }} />
                            <label class="custom-control-label gotham text-color-1 font-weight-bold font-size-80 line-height-195 cursor-pointer" for="donor-info-1">{{ (Auth::check()) ? 'Or appear as' : 'Appear as' }}</label>
                        </div>
                    </div>

                    <div class="donor-option-content" data-option="input">
                        <div class="form-group form-group-2 mt-1 mb-2">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" />
                        </div>
                        <div class="form-group form-group-2 mt-1 mb-2">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" />
                        </div>
                    </div>

                    <div class="text-center pl-2 mt-3">
                        <div class="custom-control custom-radio custom-control-inline d-inline-block">
                            <input type="radio" id="donor-info-2" name="donor-info" value="anonymous" class="custom-control-input" />
                            <label class="custom-control-label gotham text-color-1 font-weight-bold font-size-80 line-height-195 cursor-pointer" for="donor-info-2">Hide my identity</label>
                        </div>
                    </div>

                    <div class="px-4 {{ (Auth::check()) ? 'pt-4 mt-4' : 'pt-5 mt-5' }}">
                        <button class="btn c-btn c-btn-3 mb-3" id="amount-donor-submit">Next<i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page cached" data-name="page-3" data-order="3">
        <div class="bg-persian-green wrapper">
            <div class="text-center pt-4">
                <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-white.png") }}" />
            </div>

            <div class="card dashboard-card mt-4">
                <div class="p-3 border-bottom-color-1">
                    <p class="gotham text-center text-color-1 font-size-75 font-weight-bold mt-2 mb-2">Your Donation</p>

                    <div id="donation-amount-display">Php 15,000</div>

                    <div class="donation-my-profile-container mt-3 mb-2">
                        <div class="section d-none" data-option="account">
                            <table class="w-100">
                                <tr>
                                    <td>
                                        <div class="photo" style="background-image:url('{{ (Auth::user()->hasMedia('display_photos')) ? Auth::user()->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png') }}')"></div>
                                    </td>
                                    <td class="pl-3">
                                        <p class="gotham text-color-1 font-weight-bold font-size-80 mb-0">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                                        <p class="gotham text-color-1 font-size-80 mb-0">Barriada, Legazpi City</p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="section d-none" data-option="input">
                            <p class="gotham text-color-1 font-weight-bold font-size-100 text-center mb-0"><i class="fas fa-user mr-1"></i> <span id="donor-name"></span></p>
                        </div>

                        <div class="section d-none" data-option="anonymous">
                            <p class="gotham text-color-1 font-weight-bold font-size-100 text-center mb-0"><i class="fas fa-user-secret mr-1"></i> Anonymous</p>
                        </div>
                    </div>
                </div>

                <div class="p-3 border-bottom-color-1">
                    <p class="gotham text-color-1 font-weight-bold font-size-80 text-center mt-2" for="donor-info-0">Choose Payment Options</p>

                    <div id="accordion" class="payment-methods-container">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h5 class="text-center mb-0">
                                    <button class="btn btn-link collapsed w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <img src="{{ url('img/payment-methods/gcash.png') }}" />
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body text-center">
                                    <p class="gotham text-persian-green font-size-80 mb-1">Mobile Number</p>
                                    <p class="gotham text-color-1 font-size-160 mb-0">09123456789</p>
                                    <button class="btn c-btn c-btn-9 mt-2 copy-to-clipboard" data-copy="09123456789">Copy Number<i class="fas fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0" id="headingTwo">
                                <h5 class="text-center mb-0">
                                    <button class="btn btn-link collapsed w-100" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <img src="{{ url('img/payment-methods/paymaya.png') }}" />
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body text-center">
                                    <p class="gotham text-persian-green font-size-80 mb-1">Mobile Number</p>
                                    <p class="gotham text-color-1 font-size-160 mb-0">09987654321</p>
                                    <button class="btn c-btn c-btn-9 mt-2 copy-to-clipboard" data-copy="09987654321">Copy Number<i class="fas fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 mt-4 px-4">
                        <button class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
