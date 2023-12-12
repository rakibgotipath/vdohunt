@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 pt-5">
            <div class="col-md-5">

                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">@lang('Email Verification')</h5>
                    </div>
                    <form method="POST" action="{{ route('password.verify.code') }}">
                        @csrf 
                        <div class="card-body">
                            <div class="form-group">
                                <label for="code">@lang('Verification Code')</label>
                                <input type="number" name="code" id="code" class="form-control" required>
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
