@extends('admin.layouts.admin_master')

@section('title', 'Setting')

@section('content')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Setting</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Default Setting</h5>
                        @if (session('status') === 'default-setting-updated')
                        <div class="alert alert-success">
                            <strong>Default Setting Updated</strong>
                        </div>
                        @endif
                        <form method="post" action="{{ route('admin.default.setting.update', $defaultSetting->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">App Name</label>
                                    <input type="text" class="form-control" name="app_name" value="{{ old('app_name', $defaultSetting->app_name) }}">
                                    @error('app_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">App Url</label>
                                    <input type="text" class="form-control" name="app_url" value="{{ old('app_url', $defaultSetting->app_url) }}">
                                    @error('app_url')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Favicon</label>
                                    <input type="file" class="form-control" name="favicon">
                                    @error('favicon')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                    @error('logo')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Main Phone Number</label>
                                    <input type="text" class="form-control" name="main_phone_number" value="{{ old('main_phone_number', $defaultSetting->main_phone_number) }}">
                                    @error('main_phone_number')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Support Phone Number</label>
                                    <input type="text" class="form-control" name="support_phone_number" value="{{ old('support_phone_number', $defaultSetting->support_phone_number) }}">
                                    @error('support_phone_number')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Main Email</label>
                                    <input type="text" class="form-control" name="main_email" value="{{ old('main_email', $defaultSetting->main_email) }}">
                                    @error('main_email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Support Email</label>
                                    <input type="text" class="form-control" name="support_email" value="{{ old('support_email', $defaultSetting->support_email) }}">
                                    @error('support_email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address">{{ old('address', $defaultSetting->address) }}</textarea>
                                    @error('address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Google Map Link</label>
                                    <textarea class="form-control" name="google_map_link">{{ old('google_map_link', $defaultSetting->google_map_link) }}</textarea>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Facebook Link</label>
                                    <input type="text" class="form-control" name="facebook_link" value="{{ old('facebook_link', $defaultSetting->facebook_link) }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Twitter Link</label>
                                    <input type="text" class="form-control" name="twitter_link" value="{{ old('twitter_link', $defaultSetting->twitter_link) }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Instagram Link</label>
                                    <input type="text" class="form-control" name="instagram_link" value="{{ old('instagram_link', $defaultSetting->instagram_link) }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Linkedin Link</label>
                                    <input type="text" class="form-control" name="linkedin_link" value="{{ old('linkedin_link', $defaultSetting->linkedin_link) }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Youtube Link</label>
                                    <input type="text" class="form-control" name="youtube_link" value="{{ old('youtube_link', $defaultSetting->youtube_link) }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mail Setting</h5>
                        @if (session('status') === 'mail-setting-updated')
                        <div class="alert alert-success">
                            <strong>Mail Setting Updated</strong>
                        </div>
                        @endif
                        <form method="post" action="{{ route('admin.mail.setting.update', $mailSetting->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <label class="form-label">Mailer</label>
                                    <input type="text" class="form-control" name="mailer" value="{{ old('mailer', $mailSetting->mailer) }}">
                                    @error('mailer')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Host</label>
                                    <input type="text" class="form-control" name="host" value="{{ old('host', $mailSetting->host) }}">
                                    @error('host')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Port</label>
                                    <input type="text" class="form-control" name="port" value="{{ old('port', $mailSetting->port) }}">
                                    @error('port')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="{{ old('username', $mailSetting->username) }}">
                                    @error('username')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" value="{{ old('password', $mailSetting->password) }}">
                                    @error('password')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Encryption</label>
                                    <input type="text" class="form-control" name="encryption" value="{{ old('encryption', $mailSetting->encryption) }}">
                                    @error('encryption')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">From Address</label>
                                    <input type="text" class="form-control" name="from_address" value="{{ old('from_address', $mailSetting->from_address) }}">
                                    @error('from_address')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
