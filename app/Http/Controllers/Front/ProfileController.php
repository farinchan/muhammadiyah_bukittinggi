<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($slug)
    {

        $profil = Profile::where('slug', $slug)->firstOrFail();
        $data = [
            'title' => 'Profile',
            'menu' => 'profile',
            'sub_menu' => '',
            'profile' => $profil
        ];

        return view('front.pages.profile.index', $data);
    }
}
