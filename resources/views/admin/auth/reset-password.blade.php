@extends('admin.layouts.auth_master')

@section('title', 'Login')

@section('content')
<div class="p-5">
    <div class="text-start">
        <img src="assets/images/logo-img.png" width="180" alt="">
    </div>
    <h4 class="mt-5 font-weight-bold">Genrate New Password</h4>
    <p class="text-muted">We received your reset password request. Please enter your new password!</p>
    <div class="mb-3 mt-5">
        <label class="form-label">New Password</label>
        <input type="text" class="form-control" placeholder="Enter new password" />
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="text" class="form-control" placeholder="Confirm password" />
    </div>
    <div class="d-grid gap-2">
        <button type="button" class="btn btn-primary">Change Password</button> <a href="authentication-login.html" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
    </div>
</div>
@endsection
