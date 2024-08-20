<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\AssetType;
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
            'assets_type' => AssetType::with('assets')->get(),
        ];

        // return response()->json($data);

        return view('front.pages.asset.index', $data);
    }
}
