@extends('layouts.master')
@section('content')
    <div class="d-flex justify-content-center text-center my-15">
        @if (auth()->check())
            <a class="btn btn-success" href="{{ route('user.upload.index') }}"><i class="fa fa-play me-2"></i> @lang('Upload')</a>
        @else
            <a class="btn btn-success me-3" href="{{ route('login') }}">@lang('Login')</a>
            <a class="btn btn-warning" href="{{ route('register') }}">@lang('Register')</a>
        @endif
    </div>
@endsection
