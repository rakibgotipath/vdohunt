@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center my-5 pt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">@lang('Upload Video')</h5>
                    </div>

                    <div class="card-body">

                        <div id="uppy"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
