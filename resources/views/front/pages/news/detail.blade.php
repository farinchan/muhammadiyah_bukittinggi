@extends('front.app')

@section('seo')
    <title>Home</title>
    <meta name="description" content="Home">
    <meta name="keywords" content="Home">
    <meta property="og:title" content="Home">
    <meta property="og:description" content="Home">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('home') }}">
    <link rel="canonical" href="{{ route('home') }}">
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ Storage::url($news->thumbnail) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $news->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> {{ $news->user->name }}</a></li>
                                <li><a href="#"><i class="fas fa-tags"></i> {{ $news->category->name }}</a>
                                </li>
                                <li><a href="#"><i class="fa fa-comments"></i> {{ $news->comments->count() }}
                                        Komentar</a></li>
                            </ul>

                            <p>
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                                people like this</p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li>Share:</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                @if ($prev_news)
                                    <div
                                        class="col-lg-5 col-md-5 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="{{ route('news.detail', $prev_news->slug) }}">
                                                <img class="" src="{{ Storage::url($prev_news->thumbnail) }}"
                                                    height="80px" width="100px" style="object-fit: cover" alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('news.detail', $prev_news->slug) }}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p style="font-size: 12px">Prev Post</p>
                                            <a href="{{ route('news.detail', $prev_news->slug) }}">
                                                <h6 style="font-size: 14px">{{ $prev_news->title }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-5 col-md-5"></div>
                                @endif
                                <div class="col-lg-2 col-md-2"></div>
                                @if ($next_news)
                                    <div
                                        class="col-lg-5 col-md-5 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p style="font-size: 12px">Next Post</p>
                                            <a href="{{ route('news.detail', $next_news->slug) }}">
                                                <h6 style="font-size: 14px">{{ $next_news->title }}</h6>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('news.detail', $next_news->slug) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('news.detail', $next_news->slug) }}">
                                                <img class="" src="{{ Storage::url($next_news->thumbnail) }}"
                                                    height="80px" width="100px" style="object-fit: cover" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src=" @if ($news->user->photo) {{ Storage::url($news->user->photo) }} @else
                                https://ui-avatars.com/api/?name={{ $news->user->name }} @endif
                            "
                                alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $news->user->name }}&nbsp; <span class="badge badge-primary">Admin</span></h4>
                                </a>
                                <p>
                                    {{ $news->user->keanggotaan }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>{{ $news->comments->count() }} Komentar</h4>
                        @foreach ($comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="@if ($comment->user_id) {{ $comment->user->photo ? Storage::url($comment->user->photo) : 'https://ui-avatars.com/api/?background=000C32&color=fff&name=' . $comment->user->name }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $comment->name }} @endif"
                                                alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $comment->comment }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{ $comment->name }}
                                                            @if ($comment->user_id == null)
                                                                <span class="badge badge-secondary">Guest</span>
                                                            @endif
                                                        </a>
                                                    </h5>
                                                    <p class="date">{{ $comment->created_at->format('d M Y') }} </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                {{-- Reply Comment --}}
                                                @foreach ($comment->children as $children)
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb">
                                                                    {{-- @dd($comment->user()) --}}
                                                                    <img src="@if ($children->user_id) {{ $children->user->photo ? Storage::url($children->user->photo) : 'https://ui-avatars.com/api/?background=000C32&color=fff&name=' . $children->user->name }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $children->name }} @endif"
                                                                        alt="">
                                                                </div>
                                                                <div class="desc">
                                                                    <p class="comment">
                                                                        {{ $children->comment }}
                                                                    </p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <h5>
                                                                                <a href="#">{{ $children->name }}
                                                                                    @if ($children->user_id == null)
                                                                                        <span
                                                                                            class="badge badge-secondary">Guest</span>
                                                                                    @endif
                                                                                </a>
                                                                            </h5>
                                                                            <p class="date">
                                                                                {{ $children->created_at->format('d M Y') }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        <form class="form-contact comment_form" action="{{ route('news.comment', $news->slug) }}"
                            id="commentForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                            placeholder="Write Comment"></textarea>
                                    </div>
                                </div>
                                @guest
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                @endguest

                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Kirim
                                    Komentar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{ route('news') }}">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="q" type="text" class="form-control"
                                            placeholder='Cari Berita' onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Cari Berita'" value="{{ request()->q }}">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('news.category', $category->slug) }}"
                                            class="d-flex justify-content-between">
                                            <p>{{ $category->name }}</p>
                                            <p>({{ $category->news->count() }})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Berita terbaru</h3>
                            @foreach ($latest_news as $news)
                                <div class="media post_item">
                                    <img src="{{ Storage::url($news->thumbnail) }}" alt="post" width="100px"
                                        height="80px" style="object-fit: cover;">
                                    <div class="media-body ">
                                        <a href="{{ route('news.detail', $news->slug) }}">
                                            <h3>{{ $news->title }}</h3>
                                        </a>
                                        <p>{{ $news->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                        {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                    <h4 class="widget_title">Tag Clouds</h4>
                    <ul class="list">
                        <li>
                            <a href="#">project</a>
                        </li>
                        <li>
                            <a href="#">love</a>
                        </li>
                        <li>
                            <a href="#">technology</a>
                        </li>
                        <li>
                            <a href="#">travel</a>
                        </li>
                        <li>
                            <a href="#">restaurant</a>
                        </li>
                        <li>
                            <a href="#">life style</a>
                        </li>
                        <li>
                            <a href="#">design</a>
                        </li>
                        <li>
                            <a href="#">illustration</a>
                        </li>
                    </ul>
                </aside> --}}


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection