<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        @auth
            <div class="sidebar-brand">
                <a href="#">{{ Auth::user()->name }}</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="#">{{ substr(Auth::user()->name, 0, 2) }}</a>
            </div>
        @endauth
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="" class="nav-link {{ request()->routeIs('dashboard') ? 'active text-success' : '' }}">
                    <i class="fas fa-fire {{ request()->routeIs('dashboard') ? 'text-success' : '' }}"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs('users.*') ? 'active text-success' : '' }}">
                    <i class="fa-solid fa-user {{ request()->routeIs('users.*') ? 'text-success' : '' }}"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('categories.index') }}"
                    class="nav-link {{ request()->routeIs('categories.*') ? 'active text-success' : '' }}">
                    <i class="fas fa-briefcase {{ request()->routeIs('categories.*') ? 'text-success' : '' }}"></i>
                    <span>Category Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('products.index') }}"
                    class="nav-link {{ request()->routeIs('products.*') ? 'active text-success' : '' }}">
                    <i class="fas fa-briefcase  {{ request()->routeIs('products.*') ? 'text-success' : '' }}"></i>
                    <span>Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('status.index') }}"
                    class="nav-link {{ request()->routeIs('status.*') ? 'active text-success' : '' }}">
                    <i class="fas fa-briefcase  {{ request()->routeIs('status.*') ? 'text-success' : '' }}"></i>
                    <span>Status Member</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('orders.index') }}"
                    class="nav-link {{ request()->routeIs('orders.*') ? 'text-success' : '' }}">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Data Laporan</span>
                </a>
            </li>
        </ul>

    </aside>
</div>
