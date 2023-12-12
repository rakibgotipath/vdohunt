@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 1-->
            <div class="card border-start-lg border-start-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">@lang('Total Videos')</div>
                            <div class="h5">{{ $widget['total_videos'] }}</div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                <a href="{{ route('admin.video.index') }}">@lang('View all')</a><i
                                    class="fa fa-angle-right ms-1"></i>
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 2-->
            <div class="card border-start-lg border-start-success h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">@lang('Approved Videos')</div>
                            <div class="h5">{{ $widget['approved_videos'] }}</div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                <a href="{{ route('admin.video.approved') }}">@lang('View all')</a><i
                                    class="fa fa-angle-right ms-1"></i>
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 3 -->
            <div class="card border-start-lg border-start-warning h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">@lang('Pending Videos')</div>
                            <div class="h5">{{ $widget['pending_videos'] }}</div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                <a href="{{ route('admin.video.pending') }}">@lang('View all')</a><i
                                    class="fa fa-angle-right ms-1"></i>
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <!-- Dashboard info widget 3 -->
            <div class="card border-start-lg border-start-danger h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small fw-bold text-primary mb-1">@lang('Rejected Videos')</div>
                            <div class="h5">{{ $widget['rejected_videos'] }}</div>
                            <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                <a href="{{ route('admin.video.rejected') }}">@lang('View all')</a><i
                                    class="fa fa-angle-right ms-1"></i>
                            </div>
                        </div>
                        <div class="ms-2">
                            <i class="fas fa-video fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
