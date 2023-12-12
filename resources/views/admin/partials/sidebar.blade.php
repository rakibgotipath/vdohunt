<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">@lang('Core')</div>

                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link {{ menuActive('admin.dashboard') }}" href="{{ route('admin.dashboard') }}">
                    <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    @lang('Dashbaord')
                </a>

                <a class="nav-link collapsed {{ menuActive(['admin.video.index', 'admin.video.approved', 'admin.video.pending', 'admin.video.rejected', 'admin.video.show']) }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseVideos" aria-expanded="false" aria-controls="collapseVideos">
                    <div class="nav-link-icon"><i class="fas fa-play"></i></div>
                    @lang('Videos')
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ menuActive(['admin.video.index', 'admin.video.approved', 'admin.video.pending', 'admin.video.rejected', 'admin.video.show'], 'show') }}" id="collapseVideos" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link {{ menuActive('admin.video.index') }}" href="{{ route('admin.video.index') }}">@lang('All')</a>
                        <a class="nav-link {{ menuActive('admin.video.approved') }}" href="{{ route('admin.video.approved') }}">@lang('Approved')</a>
                        <a class="nav-link {{ menuActive('admin.video.pending') }}" href="{{ route('admin.video.pending') }}">@lang('Pending')</a>
                        <a class="nav-link {{ menuActive('admin.video.rejected') }}" href="{{ route('admin.video.rejected') }}">@lang('Rejected')</a>
                    </nav>
                </div>

                <a class="nav-link collapsed {{ menuActive(['admin.user.index', 'admin.user.verified', 'admin.user.unverified']) }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                    @lang('Users')
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse {{ menuActive(['admin.user.index', 'admin.user.verified', 'admin.user.unverified'], 'show') }}" id="collapseUsers" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link {{ menuActive('admin.user.index') }}" href="{{ route('admin.user.index') }}">@lang('All')</a>
                        <a class="nav-link {{ menuActive('admin.user.verified') }}" href="{{ route('admin.user.verified') }}">@lang('Verified')</a>
                        <a class="nav-link {{ menuActive('admin.user.unverified') }}" href="{{ route('admin.user.unverified') }}">@lang('Unverified')</a>
                    </nav>
                </div>

            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->guard('admin')->user()->name }}</div>
            </div>
        </div>
    </nav>
</div>
