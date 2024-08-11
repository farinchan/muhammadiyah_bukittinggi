<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.pages.auth.login');
    }

    public function register()
    {
        return view('front.pages.auth.register');
    }

    public function registerProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
            'phone' => 'required',
            
        ]);
    }

}
