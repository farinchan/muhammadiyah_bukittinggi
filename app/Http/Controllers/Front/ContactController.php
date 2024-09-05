<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => "Contact Us | " . $setting_web->name,
            'meta_description' => "Contact Us",
            'meta_keywords' => 'Contact Us',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,
        ];
        return view('front.pages.contact.index', $data);
    }
}
