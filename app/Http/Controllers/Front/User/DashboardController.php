<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => 'Dashboard',
            'metaTitle' => 'Dashboard',
            'metaDescription' => 'Dashboard',
            'metaKeywords' => 'Dashboard',
            'url' => 'dashboard',
            'setting_web' => $setting_web,
        ];

        return view('front.pages.user.dashboard', $data);
    }
}
