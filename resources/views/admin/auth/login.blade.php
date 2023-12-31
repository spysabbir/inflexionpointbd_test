@extends('admin.layouts.auth_master')

@section('title', 'Login')

@section('content')
<div class="p-4 rounded">
    <div class="text-center">
        <h3 class="">Sign in</h3>
    </div>
    <div class="form-body">
        @if (session('status'))
        <div class="alert alert-info">
            <strong>{{ session('status') }}</strong>
        </div>
        @endif
        <form class="row g-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="col-12">
                <label for="inputEmailAddress" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmailAddress" placeholder="Email Address">
                @error('email')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Enter Password</label>
                <div class="input-group" id="show_hide_password">
                    <input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                </div>
                @error('password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
            </div>
            @if (Route::has('password.request'))
            <div class="col-md-6 text-end">
                <a href="{{ route('password.request') }}">Forgot Password ?</a>
            </div>
            @endif
            <div class="col-12">
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bxs-lock-open"></i>Sign in
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
