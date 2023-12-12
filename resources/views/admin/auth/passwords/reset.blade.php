@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 pt-5">
            <div class="col-md-5">
                
                <div class="logo d-flex justify-content-center mb-5">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid d-block mx-auto" alt="">
                    </a>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">@lang('New Password')</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.password.change') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="password">@lang('Password')</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">@lang('Confirm Password')</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
