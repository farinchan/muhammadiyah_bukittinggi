<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use App\Models\News;
use App\Models\Pengumuman;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => "Home | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'Home, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,

            'news' => news::with('category')->latest()->limit(4)->get(),
            'pengumumans' => Pengumuman::latest()->limit(5)->get(),
            'kajians' => Kajian::latest()->limit(8)->get(),

        ];
        return view('front.pages.home.index', $data);
    }
}
