<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "email"=>"skillshub@gmail.com",
            "phone"=>"01022147602",
            "facebook"=>"https://www.facebook.com",
            "instagram"=>"https://www.instagram.com",
            "twitter"=>"https://www.twitter.com",
            "youtube"=>"https://www.youtube.com",
            "linkedin"=>"https://www.linkedin.com",
        ]);
    }
}
