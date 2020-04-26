@extends("admin.layouts.main")

@section("title")
    Campaigns
@stop

@section('breadcrumbs')
    @if(!$campaign)
        <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
            <li class="breadcrumb-item active">Campaigns</li>
        </ol>
    @else
        <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
            <li class="breadcrumb-item"><a href="{{ route('admin.campaigns') }}">Campaigns</a></li>
            <li class="breadcrumb-item active">{{ $campaign['first_name'] . ' ' . $campaign['last_name'] }}</li>
        </ol>
    @endif
@stop

@section("content")
    @if(!$campaign)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="sk-three-bounce py-5 my-5 loading">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>

                <table class="table table-bordered data-table d-none">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Date &amp; Time Added</th>
                            <th>Deceased</th>
                            <th>Date of Birth &amp; Death</th>
                            <th>Campaign Date</th>
                            <th>Funeral</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Date &amp; Time Added</th>
                            <th>Deceased</th>
                            <th>Date of Birth &amp; Death</th>
                            <th>Campaign Date</th>
                            <th>Funeral</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($campaigns as $campaign)
                        <tr>
                            <td>
                                <a href="{{ route('admin.view-campaign', \Illuminate\Support\Facades\Crypt::encryptString($campaign["id"])) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>{!! \Carbon\Carbon::parse($campaign["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                            <td>{{ $campaign['first_name'] . ' ' . $campaign['last_name'] }}</td>
                            <td>
                                <div>Birth: {!! \Carbon\Carbon::parse($campaign["date_of_birth"])->format('M&\nb\sp;j,&\nb\sp;Y') !!}</div>
                                <div>Death: {!! \Carbon\Carbon::parse($campaign["date_of_death"])->format('M&\nb\sp;j,&\nb\sp;Y') !!}</div>
                            </td>
                            <td>
                                <div>{!! \Carbon\Carbon::parse($campaign["start_of_campaign"])->format('M&\nb\sp;j,&\nb\sp;Y') . ' - ' . \Carbon\Carbon::parse($campaign["end_of_campaign"])->format('M&\nb\sp;j,&\nb\sp;Y') !!}</div>
                                <div class="badge {{ ($campaign["end_of_campaign"] >= \Carbon\Carbon::today()) ? 'badge-success' : 'badge-secondary' }} py-1 px-2">{{ ($campaign["end_of_campaign"] >= \Carbon\Carbon::today()) ? 'Active' : 'Ended' }}</div>
                            </td>
                            <td>{{ $campaign['funeral'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-current">admin.campaigns</div>
    @else
    <div class="row" id="campaign-cards-container">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-3 mb-4">
            <div class="card px-5 px-sm-0">
                <div class="card-body d-flex align-items-center px-5 px-sm-3 py-2 py-sm-3">
                    <a href="{{ $campaign->getMedia('deceased_photos')->last()->getFullUrl() }}" data-fancybox="" class="w-100">
                        <div id="campaign-deceased-photo" style="background-image:url('{{ $campaign->getMedia('deceased_photos')->last()->getFullUrl() }}')"></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-9 mb-4">
            <div class="card">
                <div class="card-body pb-0">
                    <a href="{{ $campaign->getMedia('cover_photos')->last()->getFullUrl() }}" data-fancybox="" class="w-100">
                        <div id="campaign-cover-photo" style="background-image:url('{{ $campaign->getMedia('cover_photos')->last()->getFullUrl() }}')"></div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-primary p-3 mfe-3">
                        <i class="fas fa-user c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{ $campaign['first_name'] . ' ' . $campaign['last_name'] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Deceased</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-info p-3 mfe-3">
                        <i class="fas fa-calendar-alt c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-info">{!! \Carbon\Carbon::parse($campaign["date_of_birth"])->format('M&\nb\sp;j,&\nb\sp;Y') . ' - ' . \Carbon\Carbon::parse($campaign["date_of_death"])->format('M&\nb\sp;j,&\nb\sp;Y') !!}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Date of Birth &amp; Death</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-warning p-3 mfe-3">
                        <i class="fas fa-calendar-week c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-warning">{!! \Carbon\Carbon::parse($campaign["start_of_campaign"])->format('M&\nb\sp;j,&\nb\sp;Y') . ' - ' . \Carbon\Carbon::parse($campaign["end_of_campaign"])->format('M&\nb\sp;j,&\nb\sp;Y') !!}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Campaign Duration</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-danger p-3 mfe-3">
                        <i class="fas fa-pen-alt c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value">
                            <a href="{{ route('admin.accounts.view', \Illuminate\Support\Facades\Crypt::encryptString($campaign["user_id"])) }}" class="text-danger">
                                {{ $campaign["user"]['first_name'] . ' ' . $campaign["user"]['last_name'] }} <i class="fas fa-link ml-1"></i>
                            </a>
                        </div>
                        <div class="text-muted text-uppercase font-weight-bold small">Author</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-success p-3 mfe-3">
                        <i class="fas fa-cross c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-success">{{ $campaign["funeral"] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Funeral</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-primary p-3 mfe-3">
                        <i class="fas fa-map-marker-alt c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{ $campaign["street"] . ' ' . $campaign["barangay"] . ', ' . $campaign["city"] . ', ' . $campaign["province"] . ', ' . $campaign["postal_code"] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Address</div>
                    </div>
                </div>
            </div>
        </div>

        @if($campaign['applied_search_filters']->isNotEmpty())
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-info p-3 mfe-3">
                        <i class="fas fa-hashtag c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-info">
                            @foreach($campaign['applied_search_filters'] as $applied_search_filters)
                            <span class="badge badge-secondary p-2 text-info bg-gray-100">{{ $applied_search_filters['search_filter']['name'] }}</span>
                            @endforeach
                        </div>
                        <div class="text-muted text-uppercase font-weight-bold small mt-1">Search Filters</div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header"><i class="fas fa-book mr-2"></i> Story</div>
                <div class="card-body text-justify pb-0">{{ $campaign["story"] }}</div>
            </div>
        </div>

        <div class="col-12">
            <hr class="mb-4 pb-3">
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-warning p-3 mfe-3">
                        <i class="fas fa-donate c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-warning">&#8369;&nbsp;<span id="total-donations">{{ number_format($campaign->total_donations(),2) }}</span></div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total Donations</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-danger p-3 mfe-3">
                        <i class="fas fa-coins c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-danger">&#8369;&nbsp;<span id="total-tip">{{ number_format($campaign->total_tip(),2) }}</span></div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total Tip</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <i class="fas fa-donate mr-2"></i> Donations
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="sk-three-bounce py-5 my-5 loading">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>

                <table class="table table-bordered data-table d-none">
                    <thead>
                        <tr>
                            <th>Date &amp; Time</th>
                            <th>Donor</th>
                            <th>Donated</th>
                            <th>Tip</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date &amp; Time</th>
                            <th>Donor</th>
                            <th>Donated</th>
                            <th>Tip</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($campaign['donations'] as $donation)
                        <tr>
                            <td>{!! \Carbon\Carbon::parse($donation["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                            <td>
                                @if($donation['user_id'])
                                    <a href="{{ route('admin.accounts.view', \Illuminate\Support\Facades\Crypt::encryptString($donation['user_id'])) }}" class="text-black">
                                        {{ $donation['first_name'] . ' ' . $donation['last_name'] }}
                                        <i class="fas fa-link ml-1"></i>
                                    </a>
                                @elseif($donation['is_anonymous'] == 0)
                                    {{ $donation['first_name'] . ' ' . $donation['last_name'] }}
                                @else
                                    Anonymous
                                @endif
                            </td>
                            <td>&#8369;&nbsp;{{ number_format($donation['amount'],2) }}</td>
                            <td>&#8369;&nbsp;{{ number_format($donation['tip'],2) }}</td>
                            <td>&#8369;&nbsp;{{ number_format($donation['amount'] + $donation['tip'],2) }}</td>
                            <td>
                                <a href="{{ $donation->getMedia('screenshots')->last()->getFullUrl() }}" data-fancybox="">
                                    <img src="{{ url('img/payment-methods/' . (($donation['payment_method'] == 1) ? 'gcash' : (($donation['payment_method'] == 2) ? 'paymaya' : '')) . '.png') }}" width="80"/>
                                </a>
                            </td>
                            <td class="donation-action-buttons-container" data-donation-id="{{ $donation['id'] }}">
                                @include('admin.partials.donation-action-buttons')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-current">admin.view-campaign</div>
    <div class="d-none" id="route-donation-update-status">{{ route('admin.donations.update-status') }}</div>
    @endif
@stop
