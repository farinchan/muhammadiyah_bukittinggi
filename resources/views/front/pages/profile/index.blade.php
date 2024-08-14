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

@section('styles')
<style>
    ul li {
        list-style: disc;
        margin-left: 20px;
    }
    ol li {
        list-style: decimal;
    }
</style>
@endsection

@section('content')
<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
                <!-- Hot Aimated News Tittle-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                    <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
               <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Tittle -->
                                <div class="about-right mb-90">
                                    <div class="about-img">
                                        <img src="assets/img/post/about_heor.jpg" alt="">
                                    </div>
                                    <div class="section-tittle mb-30 pt-30">
                                        <h3>{{ $profile->name }}</h3>
                                    </div>
                                    <div class="about-prea">
                                        <p>

                                            {!! $profile->content !!}
                                        </p>
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
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{ asset('front/img/news/icon-fb.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{ asset('front/img/news/icon-tw.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{ asset('front/img/news/icon-ins.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="{{ asset('front/img/news/icon-yo.png') }}"
                                                alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Subscribe</h4>
                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'" placeholder="Enter email"
                                            required="">
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
