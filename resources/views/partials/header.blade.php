<nav class="navbar navbar-expand-lg navbar-dark bg-dark align-content-center py-2">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
            <ul class="navbar-nav">
                @if (auth()->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">@lang('Dashboard')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">@lang('Logout')</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('Register')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('Login')</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>
