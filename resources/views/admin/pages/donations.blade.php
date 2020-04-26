@extends("admin.layouts.main")

@section("title")
    Donations
@stop

@section('breadcrumbs')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item active">Donations</li>
    </ol>
@stop

@section("content")
    <div class="nav-tabs-boxed">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#for-verification" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fas fa-question-circle mr-1"></i> For Verification
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#verified" role="tab" aria-controls="profile" aria-selected="false">
                    <i class="fas fa-check-circle mr-1"></i> Verified
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#invalid" role="tab" aria-controls="messages" aria-selected="false">
                    <i class="fas fa-times-circle mr-1"></i> Invalid
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="for-verification" role="tabpanel">
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
                                <th>Campaign</th>
                                <th>Donor</th>
                                <th>Donated</th>
                                <th>Tip</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($donations as $donation)
                                @if($donation['status'] == 0)
                            <tr>
                                <td>{!! \Carbon\Carbon::parse($donation["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                                <td>
                                    <a href="{{ route('admin.view-campaign', \Illuminate\Support\Facades\Crypt::encryptString($donation['campaign_id'])) }}" class="text-black">
                                        {{ $donation['campaign']['first_name'] . ' ' . $donation['campaign']['last_name'] }}
                                        <i class="fas fa-link ml-1"></i>
                                    </a>
                                </td>
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="verified" role="tabpanel">
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
                                <th>Campaign</th>
                                <th>Donor</th>
                                <th>Donated</th>
                                <th>Tip</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($donations as $donation)
                                @if($donation['status'] == 2)
                            <tr>
                                <td>{!! \Carbon\Carbon::parse($donation["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                                <td>
                                    <a href="{{ route('admin.view-campaign', \Illuminate\Support\Facades\Crypt::encryptString($donation['campaign_id'])) }}" class="text-black">
                                        {{ $donation['campaign']['first_name'] . ' ' . $donation['campaign']['last_name'] }}
                                        <i class="fas fa-link ml-1"></i>
                                    </a>
                                </td>
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="invalid" role="tabpanel">
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
                                <th>Campaign</th>
                                <th>Donor</th>
                                <th>Donated</th>
                                <th>Tip</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($donations as $donation)
                                @if($donation['status'] == 1)
                            <tr>
                                <td>{!! \Carbon\Carbon::parse($donation["created_at"])->format('D,&\nb\sp;M&\nb\sp;j,&\nb\sp;Y g:i&\nb\sp;A') !!}</td>
                                <td>
                                    <a href="{{ route('admin.view-campaign', \Illuminate\Support\Facades\Crypt::encryptString($donation['campaign_id'])) }}" class="text-black">
                                        {{ $donation['campaign']['first_name'] . ' ' . $donation['campaign']['last_name'] }}
                                        <i class="fas fa-link ml-1"></i>
                                    </a>
                                </td>
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
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="d-none" id="route-current">admin.donations</div>
    <div class="d-none" id="route-donation-update-status">{{ route('admin.donations.update-status') }}</div>
@stop
