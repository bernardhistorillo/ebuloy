<ul class="c-sidebar-nav ps ps--active-y">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ (\Request::route()->getName() == 'admin.dashboard') ? 'c-active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-tachometer-alt c-sidebar-nav-icon"></i> Dashboard
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ (in_array(\Request::route()->getName(), ['admin.campaigns', 'admin.view-campaign'])) ? 'c-active' : '' }}" href="{{ route('admin.campaigns') }}">
            <i class="fas fa-calendar-alt c-sidebar-nav-icon"></i> Campaigns
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ (in_array(\Request::route()->getName(), ['admin.accounts', 'admin.accounts.view'])) ? 'c-active' : '' }}" href="{{ route('admin.accounts') }}">
            <i class="fas fa-users c-sidebar-nav-icon"></i> Accounts
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link {{ (in_array(\Request::route()->getName(), ['admin.donations'])) ? 'c-active' : '' }}" href="{{ route('admin.donations') }}">
            <i class="fas fa-donate c-sidebar-nav-icon"></i> Donations
        </a>
    </li>
</ul>
