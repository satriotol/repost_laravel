<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin') }}">PT BPS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin') }}">BPS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin Area</li>
            <li class="{{ Request::routeIs('admin') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('slider.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('slider.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('unit.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('unit.index') }}">
                    <i class="fas fa-building"></i>
                    <span>Unit Usaha</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('partner.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('partner.index') }}">
                    <i class="fas fa-handshake"></i>
                    <span>Partner</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('about.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('about.index') }}">
                    <i class="fas fa-address-card"></i>
                    <span>Tentang</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('gallery.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('gallery.index') }}">
                    <i class="fas fa-images"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('carrier.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('carrier.index') }}">
                    <i class="fas fa-briefcase"></i>
                    <span>Karir</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
