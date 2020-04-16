<div class="px-3 pt-2 pb-3">
    <div class="row">
        <div class="col-8">
            <p class="label mb-0">ACCOUNT INFORMATION</p>
        </div>
        <div class="col-4">
            <p class="account-edit-text cursor-pointer mb-0" data-toggle="modal" data-target="#modal-edit-account">EDIT</p>
        </div>
    </div>

    <table class="w-100 mt-3">
        <tr>
            <td class="width-85">
                <div class="account-image-container" style="background-image: url('{{ (Auth::user()->hasMedia('display_photos')) ? Auth::user()->getMedia('display_photos')->last()->getFullUrl() : url('img/default/user.png')  }}')"></div>
            </td>
            <td class="pl-3 account-details">
                <p class="font-weight-bold">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                <p>{{ Auth::user()->address }}</p>
                <p>{{ Auth::user()->mobile_number }}</p>
                <p class="mb-0">{{ Auth::user()->email_address }}</p>
            </td>
        </tr>
    </table>
</div>

<div id="earned-donations-container" class="px-3 py-3">
    <p class="label mb-0">EARNED DONATIONS</p>
    <div class="row mt-3 px-2">
        <div class="col-4 px-2">
            <div class="earned-donations">
                <div>
                    <p class="amount">2,000</p>
                    <p class="method">GCASH</p>
                </div>
            </div>
        </div>
        <div class="col-4 px-2">
            <div class="earned-donations">
                <div>
                    <p class="amount">5,000</p>
                    <p class="method">PAYMAYA</p>
                </div>
            </div>
        </div>
        <div class="col-4 px-2">
            <div class="earned-donations total">
                <div>
                    <p class="amount">7,000</p>
                    <p class="method">TOTAL</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="bank-account-information-container" class="px-3 py-3">
    <div class="row">
        <div class="col-8">
            <p class="label mb-0">BANK ACCOUNT INFORMATION</p>
        </div>
        <div class="col-4">
            <p class="account-edit-text mb-0">EDIT</p>
        </div>
    </div>

    <table class="mt-3 w-100">
        <tr>
            <td class="width-85">Bank Name</td>
            <td>BDO UNIBANK</td>
        </tr>
        <tr>
            <td>Account No.</td>
            <td>**** **** **** 1234</td>
        </tr><tr>
            <td>Account Name</td>
            <td>Ismael Jerusalem</td>
        </tr>
    </table>
</div>
