@extends('admin.layouts.master')
@section('content')
    @include('admin.partials.topbar')
    <div id="layoutSidenav">
        @include('admin.partials.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid py-xl-4 px-xl-4">
                    <h1 class="mb-3">{{ $pageTitle ?? '' }}</h1>
                    @yield('panel')
                </div>
            </main>
        </div>
    </div>
@endsection
