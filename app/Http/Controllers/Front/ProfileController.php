<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function profile($slug)
    {

        $profil = Profile::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $profil->name . " | " . $setting_web->name,
            'meta_description' => Str::limit(strip_tags($profil->content), 300),
            'meta_keywords' => $profil->name . ', Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,
            
            'profile' => $profil
        ];

        return view('front.pages.profile.index', $data);
    }
}
