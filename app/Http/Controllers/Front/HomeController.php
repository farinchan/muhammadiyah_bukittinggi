<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\Kajian;
use App\Models\News;
use App\Models\Pengumuman;
use App\Models\SettingBanner;
use App\Models\SettingWebsite;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

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
            'setting_web' => $setting_web,

            'banner_list' => SettingBanner::latest()->get(),
            'news' => news::with('category')->latest()->limit(4)->get(),
            'pengumumans' => Pengumuman::latest()->limit(5)->get(),
            'kajians' => Kajian::latest()->where('status', 'published')->limit(6)->get(),
            'list_album' => GalleryAlbum::latest()->limit(6)->get(),

        ];
        // return response()->json($data);
        return view('front.pages.home.index', $data);
    }

    public function message()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ],[
            'required' => 'Kolom :attribute harus diisi',
            'email' => 'Format email tidak valid',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Pesan gagal dikirim');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = request()->all();
        ContactUs::create($data);

        Alert::success('Berhasil', 'Pesan berhasil dikirim');
        return redirect()->back();

    }

    public function subscribe()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
        ],[
            'required' => 'Kolom :attribute harus diisi',
            'email' => 'Format email tidak valid',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Terjadi kesalahan');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = request()->all();
        if (Subscriber::where('email', $data['email'])->first()) {
            Alert::error('Gagal', 'Email sudah terdaftar');
            return redirect()->back();
        }

        Subscriber::create($data);

        Alert::success('Berhasil', 'Email berhasil disubscribe');
        return redirect()->back();

    }
}
