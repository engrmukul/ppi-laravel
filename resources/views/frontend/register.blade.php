@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="well">
                    <h3 class="text-center mt-4">Register Your Account</h3>

                    @include('backend.partials._message')

                    <form action="{{ route('register') }}" method="post" class="form form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input name="full_name" id="full_name" type="text" class="form-control" placeholder="Enter full name" value="{{ old('full_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input name="phone_number" id="phone_number" type="text" class="form-control" placeholder="Enter phone number" value="{{ old('phone_number') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input name="password_confirmation" id="confirm_password" type="password" class="form-control" placeholder="Enter password again">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Register
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
