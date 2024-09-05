<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => "Aset | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'aset, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'assets_type' => AssetType::with('assets')->get(),
        ];

        // return response()->json($data);

        return view('front.pages.asset.index', $data);
    }
}
