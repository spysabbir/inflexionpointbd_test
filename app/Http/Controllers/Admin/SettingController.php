<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultSetting;
use App\Models\MailSetting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    // Change Env Function
    public function changeEnv($envKey, $envValue)
    {
        $envFilePath = app()->environmentFilePath();
        $strEnv = file_get_contents($envFilePath);
        $strEnv.="\n";
        $keyStartPosition = strpos($strEnv, "{$envKey}=");
        $keyEndPosition = strpos($strEnv, "\n",$keyStartPosition);
        $oldLine = substr($strEnv, $keyStartPosition, $keyEndPosition-$keyStartPosition);

        if(!$keyStartPosition || !$keyEndPosition || !$oldLine){
            $strEnv.="{$envKey}={$envValue}\n";
        }else{
            $strEnv=str_replace($oldLine, "{$envKey}={$envValue}",$strEnv);
        }
        $strEnv=substr($strEnv, 0, -1);
        file_put_contents($envFilePath, $strEnv);
    }

    public function setting() {
        $defaultSetting = DefaultSetting::first();
        $mailSetting = MailSetting::first();
        return view('admin.setting.index', compact('defaultSetting', 'mailSetting'));
    }

    public function defaultSettingUpdate(Request $request, $id) {
        $request->validate([
            'app_name' => 'required',
            'app_url' => 'required',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg',
            'main_phone_number' => 'required|min:11|max:14',
            'support_phone_number' => 'nullable|min:11|max:14',
            'main_email' => 'required|email|max:255',
            'support_email' => 'nullable|email|max:255',
            'address' => 'required',
        ]);

        // $this->changeEnv("APP_NAME", "'$request->app_name'");
        // $this->changeEnv("APP_URL", "'$request->app_url'");

        $defaultSetting = DefaultSetting::where('id', $id)->first();

        $defaultSetting->update([
            'app_name' => $request->app_name,
            'app_url' => $request->app_url,
            'main_phone_number' => $request->main_phone_number,
            'support_phone_number' => $request->support_phone_number,
            'main_email' => $request->main_email,
            'support_email' => $request->support_email,
            'address' => $request->address,
            'google_map_link' => $request->google_map_link,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instagram_link' => $request->instagram_link,
            'linkedin_link' => $request->linkedin_link,
            'youtube_link' => $request->youtube_link
        ]);

        // Logo Photo Upload
        if($request->hasFile('logo')){
            if($defaultSetting->logo != 'default_logo.png'){
                unlink(base_path("public/uploads/default_photo/").$defaultSetting->logo);
            }

            $logo_name = "Logo".".". $request->file('logo')->getClientOriginalExtension();
            $upload_link = base_path("public/uploads/default_photo/").$logo_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('logo'));
            $image->resize(120, 80);
            $image->save($upload_link);

            $defaultSetting->update([
                'logo' => $logo_name
            ]);
        }

        // Favicon Upload
        if($request->hasFile('favicon')){
            if($defaultSetting->favicon != 'default_favicon.png'){
                unlink(base_path("public/uploads/default_photo/").$defaultSetting->favicon);
            }
            $favicon_name = "Favicon".".". $request->file('favicon')->getClientOriginalExtension();
            $upload_link = base_path("public/uploads/default_photo/").$favicon_name;

            $manager = new ImageManager(new Driver());
            $image = $manager->read($request->file('favicon'));
            $image->resize(80, 80);
            $image->save($upload_link);

            $defaultSetting->update([
                'favicon' => $favicon_name
            ]);
        }

        $notification = array(
            'message' => 'Default setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function mailSettingUpdate(Request $request, $id) {
        $request->validate([
            '*' => 'required',
        ]);

        $this->changeEnv("MAIL_MAILER", $request->mailer);
        $this->changeEnv("MAIL_HOST", $request->host);
        $this->changeEnv("MAIL_PORT", $request->port);
        $this->changeEnv("MAIL_USERNAME", $request->username);
        $this->changeEnv("MAIL_PASSWORD", $request->password);
        $this->changeEnv("MAIL_ENCRYPTION", $request->encryption);
        $this->changeEnv("MAIL_FROM_ADDRESS", $request->from_address);

        $mailSetting = MailSetting::where('id', $id)->first();

        $mailSetting->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,
        ]);

        $notification = array(
            'message' => 'Mail setting updated successfully.',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
