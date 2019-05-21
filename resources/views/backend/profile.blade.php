@extends('layouts.backend')

@section('main')

    <div class="mt-4">
        @include('backend.partials._message')
    </div>

    <div class="card mt-4">
        <div class="card-header">
            My Profile
        </div>

        <div class="card-body">
            <form action="{{ route('profile') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input name="full_name" value="{{ $user->full_name }}" type="text" class="form-control" id="full_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input name="phone_number" value="{{ $user->phone_number }}" type="text" class="form-control" id="phone_number" required>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="10" required>{{ $user->address }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Update Profile
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Change Password
        </div>

        <div class="card-body">
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input name="old_password" type="password" class="form-control" id="old_password" required>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Change Password
                </button>
            </form>
        </div>
    </div>
@stop
