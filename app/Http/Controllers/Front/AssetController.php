<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function asset()
    {
        $data = [
            'title' => 'Asset',
            'metaTitle' => 'Asset',
            'metaDescription' => 'Asset',
            'metaKeywords' => 'Asset',
            'url' => 'asset',
        ];

        return view('front.pages.asset.index', $data);
    }
}
