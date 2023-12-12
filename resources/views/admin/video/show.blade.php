@extends('admin.layouts.app')

@section('panel')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div style="position:relative;padding-top:56.25%;"><iframe src="https://iframe.mediadelivery.net/embed/{{ config('video.library_id') }}/{{ $video->bunny_id }}?autoplay=true&loop=false&muted=false&preload=true" loading="lazy" style="border:0;position:absolute;top:0;height:100%;width:100%;" allow="accelerometer;gyroscope;autoplay;encrypted-media;picture-in-picture;" allowfullscreen="true"></iframe></div>
                </div>
                <div class="card-footer">
                    <a onclick="return confirm('Are you sure you want to approve this video?')" href="{{ route('admin.video.approve', $video->id) }}" class="btn btn-success me-3" data-bs-toggle="tooltip" data-bs-title="@lang('Approve')">
                        <i class="fa fa-check me-1"></i> @lang('Approve')
                    </a>
                    <a onclick="return confirm('Are you sure you want to reject this video?')" href="{{ route('admin.video.reject', $video->id) }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="@lang('Reject')">
                        <i class="fa fa-times me-1"></i> @lang('Reject')
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection