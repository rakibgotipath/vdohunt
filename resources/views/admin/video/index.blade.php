@extends('admin.layouts.app')
@section('panel')
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('User')</th>
                            <th scope="col">@lang('Video Status')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Upload Date')</th>
                            <th scope="col" class="text-end">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($videos as $video)
                            <tr class="align-middle">
                                <td>
                                    <img class="rounded me-1" width="50" height="50" src="{{ $video->thumbnail() }}" alt="{{ $video->name }}">
                                    <span class="fw-bold">{{ $video->name }}</span>
                                </td>

                                <td>{{ $video->user->name }}</td>
                                <td>
                                    @if ($video->video_status == 1)
                                        <span class="badge bg-warning text-light">@lang('Processing')</span>
                                    @elseif($video->video_status == 2)
                                        <span class="badge bg-danger text-light">@lang('Encoding')</span>
                                    @elseif($video->video_status == 3)
                                        <span class="badge bg-success text-light">@lang('Finished')</span>
                                    @elseif($video->video_status == 4)
                                        <span class="badge bg-danger text-light">@lang('Resolution finished')</span>
                                    @elseif($video->video_status == 5)
                                        <span class="badge bg-danger text-light">@lang('Failed')</span>
                                    @else
                                        <span class="badge bg-warning text-light">@lang('Queued')</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($video->status == 1)
                                        <span class="badge bg-success text-light">@lang('Approved')</span>
                                    @elseif($video->status == 2)
                                        <span class="badge bg-danger text-light">@lang('Rejected')</span>
                                    @else
                                        <span class="badge bg-warning text-light">@lang('Pending')</span>
                                    @endif
                                </td>
                                <td>
                                    {{ showDateTime($video->created_at) }}<br>
                                    {{ $video->created_at->diffForHumans() }}
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.video.show', $video->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-title="@lang('View')">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to approve this video?')" href="{{ route('admin.video.approve', $video->id) }}" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-title="@lang('Approve')">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure you want to reject this video?')" href="{{ route('admin.video.reject', $video->id) }}" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-title="@lang('Reject')">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">@lang('No video found')</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        @if ($videos->hasPages())
            <div class="card-footer">
                {{ $videos->links() }}
            </div>
        @endif
    </div>
@endsection
