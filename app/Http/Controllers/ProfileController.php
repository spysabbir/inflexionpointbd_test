<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function profileUpdate(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'min:11'],
            'gender' => ['nullable'],
            'date_of_birth' => ['nullable', 'date'],
            'address' => ['nullable', 'string', ],
            'profile_photo' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        Auth::user()->update($request->except('profile_photo'));

        // Profile Photo Upload
        // if($request->hasFile('profile_photo')){
        //     if(Auth::user()->profile_photo != 'default_profile_photo.png'){
        //         unlink(base_path("public/uploads/profile_photo/").Auth::user()->profile_photo);
        //     }
        //     $profile_photo_name = Auth::user()->id."-Profile-Photo".".". $request->file('profile_photo')->getClientOriginalExtension();
        //     $upload_link = base_path("public/uploads/profile_photo/").$profile_photo_name;
        //     Image::make($request->file('profile_photo'))->resize(120, 120)->save($upload_link);
        //     Auth::user()->update([
        //         'profile_photo' => $profile_photo_name
        //     ]);
        // }

        $notification = array(
            'message' => 'Profile updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function passwordUpdate(Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
            'password_confirmation' => ['required', Password::defaults()],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        $notification = array(
            'message' => 'Password updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
