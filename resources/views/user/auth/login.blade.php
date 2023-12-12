@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 pt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">@lang('Login')</h5>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">@lang('E-mail')</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">@lang('Password')</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="form-check me-3">
                                    <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">@lang('Remember Me')</label>
                                </div>
                                <a href="{{ route('password.reset') }}" class="forget-text">@lang('Forgot Password')?</a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary w-100">@lang('Login')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
