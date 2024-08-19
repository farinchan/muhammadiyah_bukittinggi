<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'metaTitle' => 'Dashboard',
            'metaDescription' => 'Dashboard',
            'metaKeywords' => 'Dashboard',
            'url' => 'dashboard',
        ];

        return view('front.pages.user.dashboard', $data);
    }

   

    
}
