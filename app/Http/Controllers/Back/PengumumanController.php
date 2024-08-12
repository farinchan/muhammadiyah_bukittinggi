<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pengumuman',
            'menu' => 'Pengumuman',
            'sub_menu' => 'Pengumuman',
            'list_pengumuman' => Pengumuman::latest()->get()
        ];

        return view('back.pages.pengumuman.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Pengumuman',
            'menu' => 'Pengumuman',
            'sub_menu' => 'Pengumuman',
        ];

        return view('back.pages.pengumuman.create', $data);
    }
}
