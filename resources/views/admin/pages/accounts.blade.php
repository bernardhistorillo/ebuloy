@extends("admin.layouts.main")

@section("title")
    Accounts
@stop

@section('breadcrumbs')
    @if(!$user)
        <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
            <li class="breadcrumb-item active">Accounts</li>
        </ol>
    @else
        <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
            <li class="breadcrumb-item"><a href="{{ route('admin.accounts') }}">Accounts</a></li>
            <li class="breadcrumb-item active">{{ $user['first_name'] . ' ' . $user['last_name'] }}</li>
        </ol>
    @endif
@stop

@section("content")
    @if(!$user)
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
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('admin.accounts.view', \Illuminate\Support\Facades\Crypt::encryptString($user["id"])) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                            <td>{{ $user['first_name'] . ' ' . $user['last_name'] }}</td>
                            <td>{{ $user['email_address'] }}</td>
                            <td>{{ $user['mobile_number'] }}</td>
                            <td>{{ $user['address'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-current">admin.accounts</div>
    @else
    <div class="row" id="campaign-cards-container">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <a href="{{ ($user->hasMedia('display_photos')) ? $user->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png') }}" data-fancybox="">
                        <div class="p-3 mfe-3" id="user-photo" style="background-image:url('{{ ($user->hasMedia('display_photos')) ? $user->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png') }}')"></div>
                    </a>
                    <div>
                        <div class="text-value text-primary">{{ $user['first_name'] . ' ' . $user['last_name'] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Name</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-info p-3 mfe-3">
                        <i class="fas fa-envelope c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-info">{{ $user['email_address'] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Email Address</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-warning p-3 mfe-3">
                        <i class="fas fa-mobile-alt c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-warning">{{ $user['mobile_number'] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Mobile Number</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body px-3 py-1 d-flex align-items-center">
                    <div class="bg-gradient-danger p-3 mfe-3">
                        <i class="fas fa-map-marker-alt c-icon c-icon-xl"></i>
                    </div>
                    <div>
                        <div class="text-value text-danger">{{ $user['address'] }}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Address</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><i class="fas fa-calendar-alt mr-2"></i> Campaigns</div>
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
                        @foreach($user->admin_campaigns() as $campaign)
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

    <div class="card">
        <div class="card-header"><i class="fas fa-donate mr-2"></i> Donations</div>
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
                            <th>Campaign</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date &amp; Time</th>
                            <th>Campaign</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($user->admin_donations() as $donation)
                        <tr>
                            <td>{!! \Carbon\Carbon::parse($donation["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                            <td>
                                <a href="{{ route('admin.view-campaign', \Illuminate\Support\Facades\Crypt::encryptString($donation['campaign_id'])) }}" class="text-black">
                                    {{ $donation['campaign']['first_name'] . ' ' . $donation['campaign']['last_name'] }}
                                    <i class="fas fa-link ml-1"></i>
                                </a>
                            </td>
                            <td>&#8369;&nbsp;{{ number_format($donation['amount'],2) }}</td>
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

    <div class="d-none" id="route-current">admin.accounts</div>
    @endif
@stop
