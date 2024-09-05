<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use App\Models\User;
use Illuminate\Http\Request;

class KeanggotaanController extends Controller
{
    public function index()
    {
        $search = request()->input('q');
        $tipe_anggota = request()->input('type');
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => "Keanggotaan | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'Keanggotaan, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'users' => User::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->where(function ($query) use ($tipe_anggota) {
                if ($tipe_anggota) {
                    $query->where('keanggotaan', $tipe_anggota);
                }
            })->paginate(12),
        ];

        return view('front.pages.keanggotaan.index', $data);
    }
}
