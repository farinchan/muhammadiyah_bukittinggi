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
        $search = request()->input('nama');
        $tipe_anggota = request()->input('keanggotaan');
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => "Keanggotaan | " . $setting_web->name,
            'meta_description' => strip_tags($setting_web->about),
            'meta_keywords' => 'Keanggotaan, Muhammadiyah, Bukittinggi',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'users' => User::where('status', '1')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })->where(function ($query) use ($tipe_anggota) {
                    if ($tipe_anggota != 'Semua' && $tipe_anggota != null) {
                        $query->where('keanggotaan', $tipe_anggota);
                    }
                })->paginate(12),
        ];

        return view('front.pages.keanggotaan.index', $data);
    }

    public function detail($id)
    {
        $setting_web = SettingWebsite::first();
        $anggota = User::with(['kajian'])->find($id);

        $data = [
            'title' => 'Detail Anggota | ' . $setting_web->name,
            'meta_description' => 'Detail Anggota',
            'meta_keywords' => 'Detail Anggota',
            'favicon' => $setting_web->favicon,
            'setting_web' => $setting_web,

            'user' => $anggota,
        ];

        return view('front.pages.keanggotaan.detail', $data);
    }
}
