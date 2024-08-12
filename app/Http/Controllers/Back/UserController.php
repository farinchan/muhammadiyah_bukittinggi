<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Anggota Aktif',
            'menu' => 'Anggota',
            'sub_menu' => '',
            'users' => User::where('status', 1)->get()
        ];
        return view('back.pages.user.index', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'List Pendaftar',
            'menu' => 'Anggota',
            'sub_menu' => '',
            'users' => User::where('status', 0)->get()
        ];
        return view('back.pages.user.regis', $data);
    }

    public function registerApprove($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        Alert::success('Success', 'Pendaftar berhasil diaktifkan');
        return redirect()->route('admin.user.register');
    }
}
