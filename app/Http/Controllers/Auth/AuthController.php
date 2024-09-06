<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SettingWebsite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'setting_web' => $setting_web,
        ];
        return view('front.pages.auth.login', $data);
    }

    public function loginProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->status == 0) {
                Auth::logout();
                Alert::error('Error', 'Akun anda belum aktif, silahkan cek email anda untuk aktivasi akun');
                return redirect()->back();
            }else{
                if (Auth::user()->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('home');
                }
            }
        }

        Alert::error('Error', 'Email atau password salah');
        return redirect()->back()->withInput()->withErrors($validator);
    }

    public function register()
    {
        $setting_web = SettingWebsite::first();
        $data = [
            'setting_web' => $setting_web,
        ];
        return view('front.pages.auth.register', $data);
    }

    public function registerProcess(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'place_of_birth' => 'required',
            'birth_date' => 'required|date',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'address' => 'required',
            'phone' => 'required',
            'keanggotaan' => 'required',
            'ktam' => 'required',
            'nbm' => 'nullable',
            'job' => 'required',
            'kepakaran' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ],[
            'max' => 'Ukuran file maksimal :max KB',
            'required' => 'Kolom :attribute harus diisi',
            'email' => 'Format email tidak valid',
            'unique' => 'Email sudah terdaftar',
            'in' => 'Pilih salah satu :attribute',
            'image' => 'File harus berupa gambar',
            'mimes' => 'Format file harus :values',
            'date' => 'Format tanggal tidak valid',
        ]
        );

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $user = new User();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->storeAs('public/anggota', date('YmdHis') . '_' . Str::slug($request->name) . '.' . $photo->getClientOriginalExtension());
            $user->photo = str_replace('public/', '', $photoPath);
        }

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->place_of_birth = $request->place_of_birth;
        $user->birth_date = $request->birth_date;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->district = $request->district;
        $user->village = $request->village;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->keanggotaan = $request->keanggotaan;
        $user->ktam = $request->ktam;
        $user->nbm = $request->nbm;
        $user->job = json_encode($request->job);
        $user->kepakaran = $request->kepakaran;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->assignRole('user');

        Mail::send('email.register_mail', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Permintaan Pendaftaran Keanggotaan Muhammadiyah');
        });

        Alert::success('Success', 'Pendaftaran berhasil, Permintaan pendaftaran anda sedang diproses oleh admin kami, silahkan cek email anda untuk informasi lebih lanjut');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
