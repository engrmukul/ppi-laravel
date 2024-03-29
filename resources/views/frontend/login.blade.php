@extends('layouts.frontend')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="well">
                    <h3 class="text-center mt-4">Login to Your Account</h3>

                    @include('backend.partials._message')

                    <form action="{{ route('login') }}" method="post" class="form form-horizontal">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" class="form-control" placeholder="Enter password">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
