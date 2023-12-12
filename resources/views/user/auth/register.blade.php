@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center my-5 pt-5">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">@lang('Create an acoount')</h5>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('E-mail')</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
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
                        <button type="submit" class="btn btn-primary w-100">@lang('Login')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection