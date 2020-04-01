<div id="cover-photo" style="background-image:url('{{ optional(optional(optional($campaign)->getMedia('cover_photos'))->last())->getFullUrl() }}')">
    @if(!$campaign)
    <div class="go-back position-fixed" id="back-button">
        <i class="fas fa-arrow-left"></i>
    </div>
    @endif
</div>

<div id="deceased-photo-container">
    <div id="deceased-photo" style="background-image:url('{{ optional(optional(optional($campaign)->getMedia('deceased_photos'))->last())->getFullUrl() }}')"></div>
</div>

<div class="py-3 px-5">
    <p class="pages-sub-header font-size-90 stroke-3 mb-1">Rest in Peace</p>
    <p class="pages-header font-size-150 mb-2" id="name">{{ optional($campaign)['first_name'] . ' ' . optional($campaign)['last_name'] }}</p>
    <p class="pages-sub-header font-size-75 stroke-3 mb-1">BORN: <span id="born">{{ ($campaign) ? \Carbon\Carbon::parse($campaign['date_of_birth'])->format('M j, Y') : '' }}</span></p>
    <p class="pages-sub-header font-size-75 stroke-3 mb-0">DIED: <span id="died">{{ ($campaign) ? \Carbon\Carbon::parse($campaign['date_of_death'])->format('M j, Y') : '' }}</span></p>
</div>

<div class="py-3 px-5" id="interment-container">
    <p class="pages-sub-header font-size-80 stroke-3 line-height-160 mb-0" id="funeral">{{ optional($campaign)['funeral'] }}</p>
    <p class="pages-sub-header font-size-80 stroke-3 line-height-160 mb-0" id="address">{{ ($campaign) ? $campaign['street'] . ', ' . $campaign['city'] . ', ' . $campaign['province'] . ', ' . $campaign['postal_code'] : '' }}</p>
</div>

<div class="py-3 px-5">
    <p class="pages-sub-header font-size-80 stroke-3 line-height-160 mb-0" id="story" data-dummy="Lorem ipsum dolor sit amet, consectetur adipicsing elit, sed do eiusmod tempor incididunt utlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitaion ullamco laboris nisi ut aliquip ex ea commodo consequat.">{{ optional($campaign)['story'] }}</p>
</div>

<div class="text-center pt-2">
    <a href="https://facebook.com" target="_blank" class="btn c-btn c-btn-8 c-btn-social-2 mr-3"><i class="fab fa-facebook-f"></i></a>
    <a href="https://instagram.com" target="_blank" class="btn c-btn c-btn-8 c-btn-social-2 mr-3"><i class="fab fa-instagram"></i></a>
    <a href="https://twitter.com" target="_blank" class="btn c-btn c-btn-8 c-btn-social-2"><i class="fab fa-twitter"></i></a>
</div>

<div class="py-4 mt-4 px-5">
    <button class="btn c-btn c-btn-1 mb-3">DONATE</button>
</div>
