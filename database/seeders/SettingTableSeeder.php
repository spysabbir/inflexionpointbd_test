<?php

namespace Database\Seeders;

use App\Models\DefaultSetting;
use App\Models\MailSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DefaultSetting::create([
            'app_name' => 'Laravel',
            'app_url' => 'http://127.0.0.1:8000',
            'favicon' => 'default_favicon.ico',
            'logo' => 'default_logo.png',
            'main_phone_number' => '0123456789',
            'main_email' => 'mail@gmail.com',
            'address' => 'Dhaka, BD',
        ]);

        MailSetting::create([
            'mailer' => 'smtp',
            'host' => 'host',
            'port' => 'port',
            'username' => 'username',
            'password' => 'password',
            'encryption' => 'tls',
            'from_address' => 'info@gmail.com',
        ]);
    }
}
