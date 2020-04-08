@if(!Auth::user()->manual_login)
<p class="text-center font-size-90">(Signed in with {{ (Auth::user()->facebook_id) ? 'Facebook' : 'Google' }})</p>
@endif

<form id="edit-account-form">
    <div class="text-center mb-3">
        <div id="upload-photo" class="{{ (Auth::user()->hasMedia('display_photos')) ? 'active' : '' }}" style="background-image:url('{{ (Auth::user()->hasMedia('display_photos')) ? Auth::user()->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png') }}')">
            <div>+</div>
        </div>
    </div>

    <div class="form-group mb-2">
        <p>First Name</p>
        <input type="text" class="form-control" name="first_name" placeholder="Juan" value="{{ Auth::user()->first_name }}" />
    </div>
    <div class="form-group mb-2">
        <p>Last Name</p>
        <input type="text" class="form-control" name="last_name" placeholder="De La Cruz" value="{{ Auth::user()->last_name }}" />
    </div>
    <div class="form-group mb-2">
        <p>Mobile Number</p>
        <input type="text" class="form-control" name="mobile_number" placeholder="+63" value="{{ Auth::user()->mobile_number }}" />
    </div>
    <div class="form-group mb-2">
        <p>Email Address</p>
        <input type="email" class="form-control" name="email_address" placeholder="hello@domain.com" value="{{ Auth::user()->email_address }}" />
    </div>
    <div class="form-group mb-2">
        <p>Address</p>
        <input type="text" class="form-control" name="address" placeholder="123 Street, Legazpi City, Albay" value="{{ Auth::user()->address }}" />
    </div>

    @if(Auth::user()->manual_login)
        <div class="form-group mb-2">
            <p>Password</p>
            <input type="password" class="form-control" name="password" placeholder="******" />
        </div>
        <div class="form-group mb-2">
            <p>Confirm Password</p>
            <input type="password" class="form-control" name="confirm_password" placeholder="******" />
        </div>
    @endif
</form>
