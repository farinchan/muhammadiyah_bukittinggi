<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    public function news()
    {
        $search = request()->input('q');
        $news = News::latest()
            ->with(['category', 'user', 'viewers', 'comments'])
            ->where('status', 'published');
        $newsCategory = NewsCategory::with('news');

        $data = [
            'title' => 'News',
            'metaTitle' => 'News',
            'metaDescription' => 'News',
            'metaKeywords' => 'News',
            'url' => 'news',

            'category' => '',
            'latest_news' => $news->limit(4)->get(),
            'categories' => $newsCategory->get(),
            'list_news' => $news->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })->paginate(6),
        ];

        return view('front.pages.news.index', $data);
    }

    public function detail($slug)
    {
        $news = News::with(['category', 'user', 'viewers', 'comments'])
            ->where('slug', $slug)
            ->firstOrFail();
        $newsCategory = NewsCategory::with('news');


        $data = [
            'title' => $news->title,
            'metaTitle' => $news->title,
            'metaDescription' => $news->description,
            'metaKeywords' => $news->title,
            'url' => 'news/' . $slug,
            'categories' => $newsCategory->get(),
            'latest_news' => news::latest()->limit(4)->get(),
            'news' => $news,
            'comments' => NewsComment::with('user', 'children')->where('news_id', $news->id)->where('parent_id', null)->get(),
            'next_news' => News::where('id', '>', $news->id)->first(),
            'prev_news' => News::where('id', '<', $news->id)->first(),
        ];
        // dd($data);

        return view('front.pages.news.detail', $data);
    }

    public function category($slug)
    {


        $search = request()->input('q');
        $newsCategory = NewsCategory::with('news');
        $news = News::latest()
            ->with(['category', 'user', 'viewers', 'comments'])
            ->where('status', 'published')
            ->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });

        $data = [
            'title' => 'News',
            'metaTitle' => 'News',
            'metaDescription' => 'News',
            'metaKeywords' => 'News',
            'url' => 'news',

            'category' => $newsCategory->where('slug', $slug)->first(),
            'categories' => $newsCategory->get(),
            'latest_news' => $news->limit(4)->get(),
            'list_news' => $news->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            })->paginate(6),
        ];

        return view('front.pages.news.index', $data);
    }

    public function comment(Request $request, $slug)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comment' => 'required',
            ], [
                'comment.required' => 'Komentar harus diisi',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->all());
                return redirect()->back()->withInput()->withErrors($validator);
            }
        } else{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'comment' => 'required',
            ], [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'comment.required' => 'Komentar harus diisi',
            ]);

            if ($validator->fails()) {
                Alert::error('Error', $validator->errors()->all());
                return redirect()->back()->withInput()->withErrors($validator);
            }
        }

        $news = News::where('slug', $slug)->firstOrFail();

        $comment = new NewsComment();
        $comment->news_id = $news->id;
        if (Auth::check()) {
            $comment->user_id = Auth::user()->id;
            $comment->name = Auth::user()->name;
            $comment->email = Auth::user()->email;
        } else {
            $comment->name = $request->name;
            $comment->email = $request->email;
        }
        $comment->comment = $request->comment;
        $comment->save();

        Alert::success('Success', 'Komentar berhasil di posting');
        return redirect()->back();
    }
}
