@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('include.messages')
    </div>
    <div class="col-md-4 mt-2">
        <div class="iq-card">
            <div class="iq-card-body">
                <ul class="patient-progress m-0 p-0 lead">
                    @if (Auth::user()->role == 1)
                    <li class="d-flex mb-3 align-items-center">
                        <div class="media-support-info">
                            <h6><a href="{{ route('utility.add.user') }}"><span class="badge badge-primary"><i class="ri-user-add-line"></i></span> Add user</a></h6>
                        </div>
                    </li>
                    @endif
                    <li class="d-flex mb-3 align-items-center">
                        <div class="media-support-info">
                            <h6><a href="{{ route('utility.profile.update') }}"><span class="badge badge-primary"><i class="ri-profile-line"></i></span> Profile update</a></h6>
                        </div>
                    </li>
                    <li class="d-flex mb-3 align-items-center">
                        <div class="media-support-info">
                            <h6><a href="{{ route('utility.change.password') }}"><span class="badge badge-primary"><i class="ri-lock-line"></i></span> Change password</a></h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
