<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class KajianController extends Controller
{
    public function kajian()
    {
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => 'Kajian',
            'metaTitle' => 'Kajian',
            'metaDescription' => 'Kajian',
            'metaKeywords' => 'Kajian',
            'url' => 'kajian',
            'setting_web' => $setting_web,


            'list_kajian' => Kajian::where('user_id', Auth::user()->id)->latest()->get(),
        ];

        return view('front.pages.user.kajian', $data);
    }

    public function kajianCreate()
    {
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => 'Kajian Create',
            'metaTitle' => 'Kajian Create',
            'metaDescription' => 'Kajian Create',
            'metaKeywords' => 'Kajian Create',
            'url' => 'kajian-create',
            'setting_web' => $setting_web,

        ];

        return view('front.pages.user.kajian-create', $data);
    }

    public function kajianStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'content' => 'required',
                'tags' => 'nullable',
            ],
            [
                'required' => ':attribute wajib diisi',
                'image' => ':attribute harus berupa gambar',
                'mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
                'max' => ':attribute maksimal 2MB',

            ]
        );

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kajian = new Kajian();
        $kajian->user_id = Auth::user()->id;
        $kajian->title = $request->title;
        $kajian->slug = Str::slug($request->title).'-'.rand(1000, 9999);
        $kajian->content = $request->content;
        $kajian->tags = $request->tags ? implode(", ", array_column(json_decode($request->tags??"['content']"), 'value')) : null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->storeAs('public/kajian', time() . '_' . Auth::user()->id . '_' . $thumbnail->getClientOriginalExtension());
            $kajian->thumbnail = str_replace('public/', '', $thumbnailPath);
        }

        $kajian->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('user.kajian');
    }

    public function kajianEdit($id)
    {
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => 'Kajian Edit',
            'metaTitle' => 'Kajian Edit',
            'metaDescription' => 'Kajian Edit',
            'metaKeywords' => 'Kajian Edit',
            'url' => 'kajian-edit',
            'setting_web' => $setting_web,


            'kajian' => Kajian::findOrFail($id),
        ];

        return view('front.pages.user.kajian-edit', $data);
    }

    public function kajianUpdate(Request $request, $id)
    {
        $kajian = Kajian::findOrFail($id);

        if(Auth::user()->id != $kajian->user_id) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back();
        }

        $validator = Validator::make(
            $request->all(),
            [
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'content' => 'required',
                'tags' => 'nullable',
            ],
            [
                'required' => ':attribute wajib diisi',
                'image' => ':attribute harus berupa gambar',
                'mimes' => ':attribute harus berupa gambar dengan format jpeg, png, jpg, gif, svg',
                'max' => ':attribute maksimal 2MB',

            ]
        );

        if ($validator->fails()) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kajian->title = $request->title;
        $kajian->slug = Str::slug($request->title).'-'.rand(1000, 9999);
        $kajian->content = $request->content;
        $kajian->tags = $request->tags ? implode(", ", array_column(json_decode($request->tags??"['content']"), 'value')) : null;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->storeAs('public/kajian', time() . '_' . Auth::user()->id . '_' . $thumbnail->getClientOriginalExtension());
            $kajian->thumbnail = $thumbnailPath;
        }

        $kajian->save();

        Alert::success('Success', 'Data berhasil disimpan');
        return redirect()->route('user.kajian');
    }

    public function kajianDestroy($id)
    {
        $kajian = Kajian::findOrFail($id);

        if(Auth::user()->id != $kajian->user_id) {
            Alert::error('Error', 'Data tidak valid');
            return redirect()->back();
        }

        $kajian->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('user.kajian');
    }
}
