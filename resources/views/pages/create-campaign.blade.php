@extends("layouts.layout")

@section("title")
Home
@stop

@section("content")
    <div id="overlay"></div>
    <div id="loading" class="">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
    </div>

    <form id="create-campaign-form" onsubmit="return false">
        <input type="text" class="d-none" name="id" value="{{ $campaign['id'] }}" />

        <div class="page" data-name="home" data-order="1">
            <a href="{{ route('dashboard') }}" class="position-absolute mt-4" id="back-button">
                <i class="fas fa-arrow-left"></i>
            </a>

            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">PERSONAL INFORMATION</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 active">1</div>
                    <a href="#page-2" class="page-number mr-3">2</a>
                    <a href="#page-2" class="page-number">3</a>
                </div>

                <div class="pt-4">
                    <div class="form-group mb-2">
                        <p>First Name</p>
                        <input type="text" class="form-control" name="first_name" placeholder="Juan" value="{{ $campaign['first_name'] }}" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Last Name</p>
                        <input type="text" class="form-control" name="last_name" placeholder="De La Cruz" value="{{ $campaign['last_name'] }}" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Date of Birth</p>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ $campaign['date_of_birth'] }}" />
                    </div>
                    <div class="form-group mb-2">
                        <p>Date of Death</p>
                        <input type="date" class="form-control" name="date_of_death" value="{{ $campaign['date_of_death'] }}" />
                    </div>

                    <p class="pages-sub-header mt-4 pt-2 font-size-80">Upload recent photo of the deceased.</p>

                    <div class="text-center">
                        <div id="upload-photo" class="{{ (optional($campaign)->hasMedia('deceased_photos')) ? 'active' : '' }}" style="background-image:url('{{ optional(optional(optional($campaign)->getMedia('deceased_photos'))->last())->getFullUrl() }}')">
                            <div>+</div>
                        </div>
                    </div>

                    <p class="pages-sub-header mt-3 pt-2 font-size-80">Upload cover photo of the deceased.</p>

                    <div class="px-5">
                        <div id="upload-cover-photo" class="{{ (optional($campaign)->hasMedia('cover_photos')) ? 'active' : '' }}" style="background-image:url('{{ optional(optional(optional($campaign)->getMedia('cover_photos'))->last())->getFullUrl() }}')">
                            <div>+</div>
                        </div>
                    </div>

                    <p class="pages-sub-header mt-3 pt-2 font-size-80">Search Filters

                    <div class="filter-pills-container">
                        @foreach($search_filters as $search_filter)
                        <div class="filter-pills {{ ($campaign && in_array($search_filter['id'], $campaign->search_filters())) ? 'active' : '' }}" data-id="{{ $search_filter['id'] }}">
                            <span>{{ $search_filter['name'] }}</span>
                            <i class="fas fa-check"></i>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 mt-3 px-4">
                    <a href="#page-2" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="page cached" data-name="page-2" data-order="2">
            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">INTERMENT INFORMATION</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number active mr-3">2</div>
                    <a href="#page-3" class="page-number">3</a>
                </div>

                <div class="pt-4">
                    <div class="form-group mb-2">
                        <p>Funeral</p>
                        <input type="text" class="form-control" name="funeral" placeholder="St. Peters" value="{{ $campaign['funeral'] }}" />
                    </div>
                </div>

                <p class="pages-sub-header text-left mt-3 mb-2 font-size-80">Campaign Duration</p>
                <div class="form-group mb-2">
                    <p>Start of Campaign</p>
                    <input type="date" class="form-control" name="start_of_campaign" value="{{ $campaign['start_of_campaign'] }}" />
                </div>
                <div class="form-group mb-2">
                    <p>End of Campaign</p>
                    <input type="date" class="form-control" name="end_of_campaign" value="{{ $campaign['end_of_campaign'] }}" />
                </div>

                <p class="pages-sub-header text-left mt-3 mb-2 font-size-80">Address</p>
                <div class="form-group mb-2">
                    <p>Street</p>
                    <input type="text" class="form-control" name="street" placeholder="123 Street" value="{{ $campaign['street'] }}" />
                </div>
                <div class="form-group mb-2">
                    <p>City</p>
                    <input type="text" class="form-control" name="city" placeholder="Legazpi" value="{{ $campaign['city'] }}" />
                </div>
                <div class="form-group mb-2">
                    <p>Province</p>
                    <input type="text" class="form-control" name="province" placeholder="Albay" value="{{ $campaign['province'] }}" />
                </div>
                <div class="form-group mb-2">
                    <p>Postal Code</p>
                    <input type="text" class="form-control" name="postal_code" placeholder="4500" value="{{ $campaign['postal_code'] }}" />
                </div>

                <div class="pt-4 mt-4 px-4">
                    <a href="#page-3" class="btn c-btn c-btn-3 mb-3">Next<i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <div class="page cached" data-name="page-3" data-order="3">
            <div class="wrapper">
                <div class="text-center pt-4">
                    <img class="ebuloy-persian-green-img" src="{{ url("img/ebuloy-persian-green.png") }}" />
                </div>

                <div class="my-3 pt-2">
                    <p class="pages-header font-size-150 mb-3">The Deceased</p>
                    <p class="pages-sub-header font-size-80">THE STORY</p>
                </div>

                <div class="text-center">
                    <div class="page-number mr-3 go-back">1</div>
                    <div class="page-number mr-3 go-back">2</div>
                    <div class="page-number active">3</div>
                </div>

                <div class="pt-4">
                    <div class="form-group textarea mb-2">
                        <p>Write a short story of the deceased.</p>
                        <textarea type="text" class="form-control" name="story" placeholder="Story">{{ $campaign['story'] }}</textarea>
                    </div>
                </div>

                <p class="mt-4" id="save-as-draft">
                    <span class="create-campaign" data-is-draft="1">Save as draft</span>
                </p>

                <div class="pt-3 px-4">
                    <a href="#page-4" id="preview-campaign" class="btn c-btn c-btn-3 mb-3">Preview<i class="fas fa-chevron-right"></i></a>
                    <button class="btn c-btn c-btn-4 mb-3 create-campaign" data-is-draft="0">Publish<i class="fas fa-chevron-right text-white"></i></button>
                </div>
            </div>
        </div>
    </form>

    <div class="page cached" data-name="page-4" data-order="4">
        @include('partials.view-campaign')
    </div>

    <div class="page cached" data-name="page-5" data-order="5">
        <div class="wrapper bg-persian-green">
            <div class="text-center pt-4">
                <img class="ebuloy-white-img" src="{{ url("img/ebuloy-white.png") }}" />
            </div>

            <div class="my-5 pt-5 pb-4 text-center">
                <img src="{{ url('img/dove.png') }}" class="width-70" />
                <p class="pages-header font-size-200 text-white mb-3">Your campaign<br>is successfully<br>published!</p>
            </div>

            <div class="text-center my-4 py-3">
                <a href="https://facebook.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-facebook-f"></i></a>
                <a href="https://instagram.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social mr-3"><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com" target="_blank" class="btn c-btn c-btn-2 c-btn-social"><i class="fab fa-twitter"></i></a>
            </div>

            <div class="pt-4 mt-3 px-4">
                <a href="{{ route('dashboard') }}" class="btn c-btn c-btn-1 mb-3">Return to Dashboard<i class="fas fa-chevron-left"></i></a>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-create-campaign-submit">{{ route('create-campaign-submit') }}</div>
@stop
