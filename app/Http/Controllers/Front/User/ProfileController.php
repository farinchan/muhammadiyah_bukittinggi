<?php

namespace App\Http\Controllers\Front\User;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function profile()
    {
        $setting_web = SettingWebsite::first();

        $data = [
            'title' => 'Profile',
            'metaTitle' => 'Profile',
            'metaDescription' => 'Profile',
            'metaKeywords' => 'Profile',
            'url' => 'profile',
            'setting_web' => $setting_web,


            "user" => Auth::user()
        ];

        return view('front.pages.user.profile_data', $data);
    }

    public function profileEdit()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'title' => 'Profile Edit',
            'metaTitle' => 'Profile Edit',
            'metaDescription' => 'Profile Edit',
            'metaKeywords' => 'Profile Edit',
            'url' => 'profile-edit',
            'setting_web' => $setting_web,

            "user" => Auth::user()
        ];

        return view('front.pages.user.profile_edit', $data);
    }

    public function profileUpdate(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'birth_date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'keanggotaan' => 'required',
            'job' => 'required',
            'kepakaran' => 'nullable',
            'email' => 'required|email',
        ],[
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa gambar dengan format: :values.',
            'max' => ':attribute tidak boleh lebih dari :max KB.',
            'required' => ':attribute tidak boleh kosong.',
            'email' => ':attribute harus berupa email.'
        ]);


        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->place_of_birth = $request->place_of_birth;
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->keanggotaan = $request->keanggotaan;
        $user->job = $request->job;
        $user->kepakaran = $request->kepakaran;
        $user->email = $request->email;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->storeAs('public/anggota', date('YmdHis') . '_' . Str::slug($request->name) . '.' . $photo->getClientOriginalExtension());
            $user->photo = str_replace('public/', '', $photoPath);
        }

        $user->save();

        Alert::success('Berhasil', 'Data berhasil diperbarui');
        return redirect()->back();      


    }
}
