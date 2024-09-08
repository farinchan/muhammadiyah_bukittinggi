@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('kajian.detail', $kajian->slug) }}">
    <link rel="canonical" href="{{ route('kajian.detail', $kajian->slug) }}">
    <meta property="og:image" content="{{ Storage::url($image) }}">
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ Storage::url($kajian->thumbnail) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $kajian->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="{{ route("keanggotaan.detail", $kajian->user?->id) }}"><i class="fa fa-user"></i> {{ $kajian->user->name }}</a></li>
                                </li>
                                <li><a href="#"><i class="fa fa-comments"></i> {{ $kajian->kajianComment->count() }}
                                        Komentar</a></li>
                                        <li><a href="#"><i class="fa fa-eye"></i>
                                            {{ $kajian->kajianViewer->count() }}
                                            Kali Dilihat</a>
                                    </li>
                            </ul>

                            <p>
                                {!! $kajian->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            <p class="like-info"><span class="align-middle"><i class="fa fa-eye"></i></span>
                                {{ $kajian->kajianViewer->count() }} orang telah melihat kajian ini
                            </p>
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                            </div>
                            <ul class="social-icons">
                                <li>Share:</li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('kajian.detail', $kajian->slug) }}&t={{ $kajian->title }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href= "https://twitter.com/intent/tweet?text={{ $kajian->title }}&url={{ route('kajian.detail', $kajian->slug) }}&via=twitter_handle"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://wa.me/?text={{ route('kajian.detail', $kajian->slug) }}"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('kajian.detail', $kajian->slug) }}&title={{ $kajian->title }}&summary=&source=" target="_new"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                @if ($prev_kajian)
                                    <div
                                        class="col-lg-5 col-md-5 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="{{ route('kajian.detail', $prev_kajian->slug) }}">
                                                <img class="" src="{{ Storage::url($prev_kajian->thumbnail) }}"
                                                    height="80px" width="100px" style="object-fit: cover" alt="">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('kajian.detail', $prev_kajian->slug) }}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p style="font-size: 12px">Prev Post</p>
                                            <a href="{{ route('kajian.detail', $prev_kajian->slug) }}">
                                                <h6 style="font-size: 14px">{{ $prev_kajian->title }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-5 col-md-5"></div>
                                @endif
                                <div class="col-lg-2 col-md-2"></div>
                                @if ($next_kajian)
                                    <div
                                        class="col-lg-5 col-md-5 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p style="font-size: 12px">Next Post</p>
                                            <a href="{{ route('kajian.detail', $next_kajian->slug) }}">
                                                <h6 style="font-size: 14px">{{ $next_kajian->title }}</h6>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('kajian.detail', $next_kajian->slug) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('kajian.detail', $next_kajian->slug) }}">
                                                <img class="" src="{{ Storage::url($next_kajian->thumbnail) }}"
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
                            <img src=" @if ($kajian->user->photo) {{ Storage::url($kajian->user->photo) }} @else
                                https://ui-avatars.com/api/?name={{ $kajian->user->name }} @endif
                            "
                                alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $kajian->user->name }}&nbsp; <span class="badge badge-primary">Admin</span></h4>
                                </a>
                                <p>
                                    {{ $kajian->user->keanggotaan }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>{{ $kajian->kajianComment->count() }} Komentar</h4>
                        @foreach ($comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="@if ($comment->user_id) @if ($comment->user->photo) {{ Storage::url($comment->user->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name= {{  $comment->user->name }} @endif
@else
https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $comment->name }} @endif"
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
                        <form class="form-contact comment_form" action="{{ route('kajian.comment', $kajian->slug) }}"
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
                            <form action="{{ route('kajian') }}">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="q" type="text" class="form-control"
                                            placeholder='Cari Kajian' onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Cari Kajian'" value="{{ request()->q }}">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Kajian terbaru</h3>
                            @foreach ($latest_kajian as $kajian)
                                <div class="media post_item">
                                    <img src="{{ Storage::url($kajian->thumbnail) }}" alt="post" width="100px"
                                        height="80px" style="object-fit: cover;">
                                    <div class="media-body ">
                                        <a href="{{ route('kajian.detail', $kajian->slug) }}">
                                            <h3>{{ $kajian->title }}</h3>
                                        </a>
                                        <p>{{ $kajian->created_at->format('d M Y') }}</p>
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
