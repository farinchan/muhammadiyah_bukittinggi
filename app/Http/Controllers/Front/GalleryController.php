<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryAlbum;
use App\Models\SettingWebsite;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function detail($slug)
    {
        $album = GalleryAlbum::where('slug', $slug)
            ->firstOrFail();

        $data = [
            'title' => $album->name,
            'meta_description' => strip_tags($album->description),
            'meta_keywords' => $album->name,
            'favicon' => $album->getThumbnail(),
            'setting_web' => SettingWebsite::first(),
            'album' => $album,
            'galleries' => Gallery::where('gallery_album_id', $album->id)->latest()->get(),
        ];

        return view('front.pages.gallery.detail', $data);
    }
}
