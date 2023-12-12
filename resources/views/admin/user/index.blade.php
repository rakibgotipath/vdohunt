@extends('admin.layouts.app')
@section('panel')
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">@lang('Name')</th>
                            <th scope="col">@lang('Videos')</th>
                            <th scope="col">@lang('Registered')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col" class="text-end">@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="align-middle">
                                <td>
                                    <span class="fw-bold">{{ $user->name }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold">{{ $user->videos()->count() }}</span>
                                </td>
                                <td>
                                    {{ showDateTime($user->created_at) }} <br> {{ $user->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-success">@lang('Active')</span>
                                    @else
                                        <span class="badge bg-danger">@lang('Inactive')</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="" class="btn btn-warning btn-sm me-1"><i class="fa fa-pencil"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">@lang('No user found')</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        @if ($users->hasPages())
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
