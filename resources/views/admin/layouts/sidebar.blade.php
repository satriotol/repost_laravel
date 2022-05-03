<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin') }}">DISKOMINFO</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin') }}">PS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin Area</li>
            <li class="{{ Request::routeIs('admin') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('social_media.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('social_media.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Social media</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
