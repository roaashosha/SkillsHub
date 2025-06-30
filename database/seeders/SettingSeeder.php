<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            "email"=>"koko@gmail.com",
            "phone"=>"0127749777",
            "facebook"=>"http://www.facebook.com",
            "instagram"=>"http://www.facebook.com",
            "youtube"=>"http://www.facebook.com",
            "twitter"=>"http://www.facebook.com",
            "linkedin"=>"http://www.facebook.com"
        ]);
    }
}
