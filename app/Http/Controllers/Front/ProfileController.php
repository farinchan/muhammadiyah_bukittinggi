<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($slug)
    {

        $profil = Profile::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $profil->name . " | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'Home, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            
            'profile' => $profil
        ];

        return view('front.pages.profile.index', $data);
    }
}
