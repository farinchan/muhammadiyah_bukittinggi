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
use App\Models\Visitor;
use App\Models\WelcomeSpeech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Facades\Agent;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;

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
            'welcome_speech' => WelcomeSpeech::first(),
            'kajians' => Kajian::latest()->where('status', 'published')->limit(4)->get(),
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

    public function vistWebsite()
    {
        try {
            $currentUserInfo = Location::get(request()->ip());
            $visitor = new Visitor();
            $visitor->ip = request()->ip();
            if ($currentUserInfo) {
                $visitor->country = $currentUserInfo->countryName;
                $visitor->city = $currentUserInfo->cityName;
                $visitor->region = $currentUserInfo->regionName;
                $visitor->postal_code = $currentUserInfo->postalCode;
                $visitor->latitude = $currentUserInfo->latitude;
                $visitor->longitude = $currentUserInfo->longitude;
                $visitor->timezone = $currentUserInfo->timezone;
            }
            $visitor->user_agent = Agent::getUserAgent();
            $visitor->platform = Agent::platform();
            $visitor->browser = Agent::browser();
            $visitor->device = Agent::device();
            $visitor->save();

            return response()->json(['status' => 'success', 'message' => 'Visitor has been saved'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 500);
        }
    }

    public function welcomeSpeech(Request $request)
    {
        $welcome = WelcomeSpeech::first();

        $data = [
            'title' => "Sambutan Ketua Pimpinan Daerah Muhammadiyah (PDM) Bukittinggi | " . $welcome?->name??"-",
            'meta_description' => strip_tags($welcome?->content),
            'meta_keywords' => $welcome?->name,
            'favicon' => $welcome?->image,
            'setting_web' => SettingWebsite::first(),
            'welcome' => $welcome
        ];

        return view('front.pages.home.welcome_speech', $data);
    }
}
