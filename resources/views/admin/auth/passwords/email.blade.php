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
                        <h5 class="mb-0">@lang('Recover Account')</h5>
                    </div>
                    <form method="POST" action="{{ route('admin.password.reset') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">@lang('E-mail')</label>
                                <input type="email" name="email" id="email" class="form-control" required>
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
