<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrganisasiOtonom;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrtomController extends Controller
{
    public function ortom($slug)
    {

        $ortom = OrganisasiOtonom::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $ortom->name . " | " . $setting_web->name,
            'meta_description' => Str::limit(strip_tags($ortom->content), 300),
            'meta_keywords' => $ortom->name . ', Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,
            
            'ortom' => $ortom
        ];

        return view('front.pages.ortom.index', $data);
    }
}
