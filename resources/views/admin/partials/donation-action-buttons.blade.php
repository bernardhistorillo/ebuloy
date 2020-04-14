@if($donation['status'] == 0)
    <button class="btn bg-gray-600 text-white dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-question-circle mr-1"></i> For Verification</button>
@elseif($donation['status'] == 1)
    <button class="btn bg-danger text-white dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-times-circle mr-1"></i> Invalid</button>
@elseif($donation['status'] == 2)
    <button class="btn bg-success text-white dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-check-circle mr-1"></i> Verified</button>
@endif

<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @if($donation['status'] != 0)
        <button class="dropdown-item bg-gray-600 text-white donation-change-status-confirm" value="{{ $donation['id'] }}" data-status="0" data-name="{{ ($donation['is_anonymous'] == 0) ? $donation['first_name'] . ' ' . $donation['last_name'] : 'Anonymous' }}" data-current-status="{{ $donation['status'] }}">
            <i class="fas fa-question-circle mr-2"></i> For Verification
        </button>
    @endif
    @if($donation['status'] != 2)
        <button class="dropdown-item bg-success text-white donation-change-status-confirm" value="{{ $donation['id'] }}" data-status="2" data-name="{{ ($donation['is_anonymous'] == 0) ? $donation['first_name'] . ' ' . $donation['last_name'] : 'Anonymous' }}" data-current-status="{{ $donation['status'] }}">
            <i class="fas fa-check-circle mr-2"></i> Verified
        </button>
    @endif
    @if($donation['status'] != 1)
        <button class="dropdown-item bg-danger text-white donation-change-status-confirm" value="{{ $donation['id'] }}" data-status="1" data-name="{{ ($donation['is_anonymous'] == 0) ? $donation['first_name'] . ' ' . $donation['last_name'] : 'Anonymous' }}" data-current-status="{{ $donation['status'] }}">
            <i class="fas fa-times-circle mr-2"></i> Invalid
        </button>
    @endif
</div>
