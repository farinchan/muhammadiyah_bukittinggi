<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'metaTitle' => 'Home',
            'metaDescription' => 'Home',
            'metaKeywords' => 'Home',
            'url' => 'home',

            'news' => news::with('category')->latest()->limit(4)->get(),
            'pengumumans' => Pengumuman::latest()->limit(5)->get(),

        ];
        return view('front.pages.home.index', $data);
    }
}
