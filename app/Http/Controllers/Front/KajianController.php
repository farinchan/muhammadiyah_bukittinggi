<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kajian;
use Illuminate\Http\Request;

class KajianController extends Controller
{
    public function kajian()
    {
        $kajian = Kajian::latest()->where('status', 'published');
        $data = [
            'title' => 'Kajian',
            'metaTitle' => 'Kajian',
            'metaDescription' => 'Kajian',
            'metaKeywords' => 'Kajian',
            'url' => 'kajian',
            
            'latest_kajian' => $kajian->limit(4)->get(),
            'list_kajian' => $kajian->paginate(6),

        ];

        return view('front.pages.kajian.index', $data);
    }
}
