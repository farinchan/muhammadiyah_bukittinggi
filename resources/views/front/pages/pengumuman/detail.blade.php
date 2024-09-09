@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('pengumuman.detail',  $pengumuman->slug) }}">
    <link rel="canonical" href="{{ route('pengumuman.detail', $pengumuman->slug) }}">
    <meta property="og:image" content="{{ Storage::url($pengumuman->image) }}">
@endsection

@section('styles')
@endsection

@section('content')
    <main class="mt-5 mb-5">
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-post">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ Storage::url($pengumuman->image) }}" alt="">
                            </div>
                            <div class="blog_details">
                                <h2>{{ $pengumuman->title }}</h2>
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $pengumuman->user->name }}</a></li>
                                    </li>
                                    <li>
                                        <a href="#"> {{ $pengumuman->created_at->format('d F Y') }}</a>
                                    </li>
                                </ul>

                                <p>
                                    {!! $pengumuman->content !!}
                                </p>
                                @if ($pengumuman->file)
                                    <object data="{{ Storage::url($pengumuman->file) }}" type="application/pdf"
                                        width="100%" height="800px">
                                        <embed src="{{ Storage::url($pengumuman->file) }}" type="application/pdf" />
                                    </object>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Ikuti Kami</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                @if ($setting_web->facebook)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->facebook }}"><img
                                                    src="{{ asset('front/img/news/icon-fb.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Facebook</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->instagram)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->instagram }}"><img
                                                    src="{{ asset('front/img/news/icon-ins.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Instagram</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->twitter)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->twitter }}"><img
                                                    src="{{ asset('front/img/news/icon-tw.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Twitter</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($setting_web->youtube)
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="{{ $setting_web->youtube }}"><img
                                                    src="{{ asset('front/img/news/icon-yo.png') }}" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>Youtube</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Subscribe</h4>
                                <form action="{{ route('subscribe') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'"
                                            placeholder="Enter email" required="">
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About US End -->
    </main>
@endsection
