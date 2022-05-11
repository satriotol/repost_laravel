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
            <li class="{{ Request::routeIs('post.*', 'post_image.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('post.index') }}">
                    <i class="fas fa-image"></i>
                    <span>Post</span>
                </a>
            </li>
            <li class="{{ Request::routeIs('report.*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('report.index') }}">
                    <i class="fas fa-book-open"></i>
                    <span>Catatan</span>
                </a>
            </li>
            @hasrole('admin')
                <li class="{{ Request::routeIs('social_media.*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('social_media.index') }}">
                        <i class="fas fa-hashtag"></i>
                        <span>Social media</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('agency.*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('agency.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Dinas</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('sector.*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('sector.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Bidang</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('user.*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endrole
        </ul>
    </aside>
</div>
