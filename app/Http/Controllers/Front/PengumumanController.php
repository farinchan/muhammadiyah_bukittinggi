<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $setting_web = SettingWebsite::first();
        $search = request()->input('q');
        $pengumuman = Pengumuman::latest()
            ->where('status', 'published');
        $data = [
            'title' => "Pengumuman | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'Pengumuman, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'latest_pengumuman' => $pengumuman->limit(4)->get(),
            'list_pengumuman' => $pengumuman->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })->paginate(6),
        ];

        return view('front.pages.pengumuman.index', $data);
    }

    public function detail($slug)
    {
        $pengumuman = Pengumuman::where('slug', $slug)
            ->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $pengumuman->title . " | " . $setting_web->name,
            'meta_description' => strip_tags($pengumuman->content),
            'meta_keywords' => 'Pengumuman, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'pengumuman' => $pengumuman,
        ];

        return view('front.pages.pengumuman.detail', $data);
    }
}

