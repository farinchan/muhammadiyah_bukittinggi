<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use App\Models\KajianComment;
use App\Models\KajianViewer;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Jenssegers\Agent\Facades\Agent;
use RealRashid\SweetAlert\Facades\Alert;
use Stevebauman\Location\Facades\Location;

class KajianController extends Controller
{
    public function kajian()
    {
        $search = request()->input('q');
        $kajian = Kajian::latest()->where('status', 'published');
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => 'Kajian',
            'metaTitle' => 'Kajian',
            'metaDescription' => 'Kajian',
            'metaKeywords' => 'Kajian',
            'url' => 'kajian',
            'setting_web' => $setting_web,

            'latest_kajian' => $kajian->limit(4)->get(),
            'list_kajian' => $kajian->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })
                ->paginate(6),
        ];

        return view('front.pages.kajian.index', $data);
    }

    public function detail($slug)
    {
        $kajian = Kajian::where('slug', $slug)->firstOrFail();
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => $kajian->title,
            'meta_description' => $kajian->meta_description,
            'meta_keywords' => 'Kajian, Muhammadiyah, Bukittinggi, ' . $kajian->meta_keywords,
            'favicon' => $setting_web->favicon,
            'image' => $kajian->thumbnail,
            'setting_web' => $setting_web,

            'kajian' => $kajian,
            'comments' => KajianComment::where('kajian_id', $kajian->id)->get(),
            'latest_kajian' => Kajian::latest()->limit(4)->get(),
            'next_kajian' => Kajian::where('id', '>', $kajian->id)->first(),
            'prev_kajian' => Kajian::where('id', '<', $kajian->id)->first(),
        ];

        $currentUserInfo = Location::get(request()->ip());
        $kajian_viewer = new KajianViewer();
        $kajian_viewer->kajian_id = $kajian->id;
        $kajian_viewer->ip = request()->ip();
        if ($currentUserInfo) {
            $kajian_viewer->country = $currentUserInfo->countryName;
            $kajian_viewer->city = $currentUserInfo->cityName;
            $kajian_viewer->region = $currentUserInfo->regionName;
            $kajian_viewer->postal_code = $currentUserInfo->postalCode;
            $kajian_viewer->latitude = $currentUserInfo->latitude;
            $kajian_viewer->longitude = $currentUserInfo->longitude;
            $kajian_viewer->timezone = $currentUserInfo->timezone;
        }
        $kajian_viewer->user_agent = Agent::getUserAgent();
        $kajian_viewer->platform = Agent::platform();
        $kajian_viewer->browser = Agent::browser();
        $kajian_viewer->device = Agent::device();
        $kajian_viewer->save();

        return view('front.pages.kajian.detail', $data);
    }

    public function comment(Request $request, $slug)
    {
        if (Auth::check()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'comment' => 'required',
                ],
                [
                    'comment.required' => 'Komentar tidak boleh kosong',
                ]
            );
            if ($validator->fails()) {
                Alert::error('Error', 'Komentar tidak boleh kosong');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'comment' => 'required',
                ],
                [
                    'name.required' => 'Nama tidak boleh kosong',
                    'email.required' => 'Email tidak boleh kosong',
                    'email.email' => 'Email tidak valid',
                    'comment.required' => 'Komentar tidak boleh kosong',
                ]
            );
            if ($validator->fails()) {
                Alert::error('Error', 'Nama, Email, dan Komentar tidak boleh kosong');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        $kajian = Kajian::where('slug', $slug)->firstOrFail();
        $comment = new KajianComment();
        $comment->kajian_id = $kajian->id;
        if (Auth::check()) {
            $comment->user_id = Auth::user()->id;
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;
        } else {
            $comment->name = $request->name;
            $comment->email = $request->email;
        }
        $comment->comment = $request->comment;
        $comment->save();

        Alert::success('Success', 'Komentar berhasil di posting');
        return redirect()->back();
    }
}
