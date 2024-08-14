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
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="{{ Storage::url($news->first()->thumbnail) }}" height="400px"
                                        style="object-fit: cover;" alt="">

                                    <div class="trend-top-cap">
                                        <span>{{ $news->first()->category->name }}</span>
                                        <ul class="blog-info-link">
                                            <li><a class="text-white" href="#"><i class="fa fa-user"></i>
                                                    {{ $news->first()->user->name }}</a></li>
                                            <li><a class="text-white" href="#"><i class="fa fa-comments"></i>
                                                    {{ $news->first()->comments->count() }}
                                                    Komentar</a></li>
                                        </ul>
                                        <h2><a class="mr-5" href="{{ route('news.detail', $news->first()->slug) }}">
                                                {{ $news->first()->title }}
                                            </a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($news as $key => $item)
                                        @if ($key != 0)
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img src="{{ Storage::url($item->thumbnail) }}" width="100%"
                                                            height="150px" style="object-fit: cover;" alt="">
                                                    </div>

                                                    <div class="trend-bottom-cap">
                                                        <span class="color1"> {{ $item->category->name }}</span>
                                                        <ul class="blog-info-link">
                                                            {{-- <li><a class="text-white" href="#"><i class="fa fa-user"></i> {{ $item->user->name }}</a></li> --}}
                                                            <li><a href="#"><i class="fa fa-comments"></i>
                                                                    {{ $item->comments->count() }}
                                                                    Komentar</a></li>
                                                        </ul>
                                                        <h4><a href="{{ route('news.detail', $item->slug) }}">
                                                                {{ Str::limit($item->title, 60) }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            <h4
                                style="font-weight: bold; color: #333; background-color: #e7ffe6; padding: 10px; border-radius: 5px;">
                                Pengumuman
                            </h4>
                            <hr>
                            @foreach ($pengumumans as $pengumuman)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img ">
                                        <img src="{{ $pengumuman->image ? Storage::url($pengumuman->image) : 'https://file.iainpare.ac.id/wp-content/uploads/2019/07/pengumuman.png' }}"
                                            height="70px" alt="">
                                    </div>

                                    <div class="trand-right-cap">
                                        {{-- <span class="color4">Pengumuman</span> --}}
                                        <div style="font-size: 12px; color: #333;">
                                            {{ $pengumuman->created_at->diffForHumans() }} </div>
                                        <h4 style=" font-size: 16px;"><a href="#">
                                                {{ Str::limit($pengumuman->title, 80) }}
                                            </a></h4>
                                    </div>
                                </div>
                            @endforeach
                            <div class="text-right">
                                <a class="text-info " href="">
                                    Lihat Selengkapnya >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('front/img/logo/logo_muhammadiyah.png') }}" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col-md-8 mt-sm-20">
                            <h1 style="color: #08652F; font-weight: bold;">
                                Pimpinan Daerah Muhammadiyah (PDM)
                            </h1>
                            <h2 style="color: #08652F; ">Kota Bukittinggi</h2>
                            <div class="mt-3">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis magni provident
                                    asperiores, aliquam iusto quae labore blanditiis quis libero vero dicta quod et sunt
                                    laboriosam modi quam. Sapiente, libero omnis minus distinctio eveniet ut sed
                                    perspiciatis vitae aspernatur id laborum expedita ex aliquid corporis officia, quae
                                    labore ab tempora facilis impedit similique? In provident est reprehenderit mollitia
                                    omnis deleniti aliquid quia beatae ullam doloremque non perferendis amet ipsum nam
                                    fugit, sint minus placeat sapiente sit molestiae pariatur. Recusandae libero soluta...
                                </p>
                            </div>
                            <a href="" class="btn btn-success mt-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!-- Kajian Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Kajian</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    {{-- <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Lifestyle</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Travel</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab"
                                                href="#nav-last" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Fashion</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab"
                                                href="#nav-nav-Sport" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Sports</a>
                                            <a class="nav-item nav-link" id="nav-technology" data-toggle="tab"
                                                href="#nav-techno" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Technology</a>
                                        </div>
                                    </nav> --}}
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($kajians as $kajian)
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{ Storage::url($kajian->thumbnail) }}"
                                                                alt="" height="230px" style="object-fit: cover;">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color3">Ustadz {{ $kajian->user->name }}</span>
                                                            <ul class="blog-info-link">
                                                                {{-- <li><a class="text-white" href="#"><i class="fa fa-user"></i> {{ $kajian->user->name }}</a></li> --}}
                                                                <li><a href="#"><i class="fa fa-comments"></i>
                                                                        {{ $kajian->kajianComment->count() }}
                                                                        Komentar</a></li>
                                                            </ul>
                                                            <h4><a href="">
                                                                    {{ Str::limit($kajian->title, 60) }}
                                                                </a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
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
                <hr>
            </div>
        </section>
        <!-- Kajian End -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="weekly2-news-active dot-style d-flex dot-style">
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('front/img/news/weekly2News1.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('front/img/news/weekly2News2.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event night</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('front/img/news/weekly2News3.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('front/img/news/weekly2News4.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Event time</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                                <div class="weekly2-single">
                                    <div class="weekly2-img">
                                        <img src="{{ asset('front/img/news/weekly2News4.jpg') }}" alt="">
                                    </div>
                                    <div class="weekly2-caption">
                                        <span class="color1">Corporate</span>
                                        <p>25 Jan 2020</p>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-lg" style="border-radius: 20px;">
                                <div class="card-body p-5">
                                    <h5 class="card-title mb-5" style="font-weight: bold; color: #333;">Hubungi Kami</h5>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <input type="text" name="name" placeholder="Nama Lengkap"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Nama Lengkap'" required=""
                                                        class="single-input">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" placeholder="Email"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Email'" required=""
                                                        class="single-input">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="subject" placeholder="Subjek"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Subjek'" required=""
                                                    class="single-input">
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="single-textarea" placeholder="Message" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Message'" required="" style="height: 200px;"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                        </div>
                                        <div class="col-md-5">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.9760992550064!2d100.37117380889596!3d-0.3059232862215682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd538bd1ff164a7%3A0xcea33881870dc19!2sJam%20Gadang%20Bukittinggi!5e0!3m2!1sid!2sid!4v1723600608898!5m2!1sid!2sid"  height="450" 
                                            style="border:0; width: 100%; border-radius: 20px;"
                                            " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->

    </main>
@endsection
