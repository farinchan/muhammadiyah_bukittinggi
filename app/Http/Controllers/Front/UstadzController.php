<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use App\Models\User;
use Illuminate\Http\Request;

class UstadzController extends Controller
{
    public function search(Request $request)
    {
        $setting_web = SettingWebsite::first();
        $query = $request->q;

        $data = [
            'title' => 'Cari Ustadz | ' . $setting_web->name,
            'meta_description' => 'Cari Ustadz',
            'meta_keywords' => 'Cari Ustadz',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'list_ustadz' => User::with(['kajian'])
            ->where('job', 'like', '%Ustadz%')->where('name', 'like', '%' . $query . '%')
            ->withCount('kajian')
            ->orderBy('kajian_count', 'desc')
            ->get(),
        ];

        return view('front.pages.ustadz.search', $data);        
    }

    
}
