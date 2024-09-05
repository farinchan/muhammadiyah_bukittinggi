<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\Kajian;
use App\Models\News;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'sub_menu' => '',
            'pengumuman_count' => Pengumuman::count(),
            'berita_count' => News::count(),
            'kajian_count' => Kajian::count(),
            'albulm_count' => GalleryAlbum::count(),


        ];
        return view('back.pages.dashboard.index', $data);
    }
}
