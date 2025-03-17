<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\Kajian;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\NewsViewer;
use App\Models\Pengumuman;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function visistorStat()
    {


        $data = [
            'visitor_monthly' => Visitor::select(DB::raw('Date(created_at) as date'), DB::raw('count(*) as total'))
                ->orderBy('date', 'desc')
                ->limit(30)
                ->groupBy('date')
                ->get(),
            'visitor_platfrom' => Visitor::select('platform', DB::raw('count(*) as total'))
                ->groupBy('platform')
                ->get(),
            'visitor_browser' => Visitor::select('browser', DB::raw('count(*) as total'))
                ->groupBy('browser')
                ->get(),
        ];
        return response()->json($data);
    }

    public function news()
    {
        $data = [
            'title' => 'Dashboard Berita',
            'menu' => 'dashboard',
            'sub_menu' => '',
            'berita_count' => News::count(),
            'news_popular' => News::with('comments')->withCount('viewers')->orderBy('viewers_count', 'desc')->limit(5)->get(),
            'news_new' => News::with(['comments', 'viewers'])->latest()->limit(5)->get(),
            'comment_new' => NewsComment::orderBy('created_at', 'desc')->limit(5)->get(),
        ];
        return view('back.pages.dashboard.news', $data);
    }

    public function stat()
    {


        $data = [
            'news_viewer_monthly' => NewsViewer::select(DB::raw('Date(created_at) as date'), DB::raw('count(*) as total'))
                ->limit(30)
                ->groupBy('date')
                ->get(),
            'news_viewer_platfrom' => NewsViewer::select('platform', DB::raw('count(*) as total'))
                ->groupBy('platform')
                ->get(),
            'news_viewer_browser' => NewsViewer::select('browser', DB::raw('count(*) as total'))
                ->groupBy('browser')
                ->get(),
        ];
        return response()->json($data);
    }
}
