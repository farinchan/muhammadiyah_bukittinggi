@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('keanggotaan') }}">
    <link rel="canonical" href="{{ route('keanggotaan') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <style>
        /* .card {
                margin-bottom: 20px;
                border: none;
                box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
                transition: all 0.3s;
                border: none;
            } */

            .card {
            border: none;
            border-radius: 0;
        }

        .card-title a:hover {
            color: #01a54d;
        }

        .card-title a {
            color: #333;
        }

        .card-title {
            font-size: 1.2rem;
            margin: 0;
        }

        .card-text {
            font-size: 1rem;
            margin: 0;
        }

        .card-text p {
            margin: 0;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">

                <!-- Hot Aimated News Tittle-->
                <div class="row my-5">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-tittle mb-40">
                                    <h3>Daftar Anggota</h3>
                                </div>
                                <div class="card">
                                    <div class="card-body" style="padding: 20px 20px 0px 20px; background-color: white;">
                                        <div class="card-text">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="staticEmail" class="col-sm-2 col-form-label">Cari
                                                        Nama</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="inputPassword">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword"
                                                        class="col-sm-2 col-form-label">Keanggotaan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Semua</option>
                                                            <option value="1">Kader Muhammadiyah</option>
                                                            <option value="2">Warga Muhammadiyah</option>
                                                            <option value="3">Simpatisan Muhammadiyah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right" style="background-color: white; border: none; padding: 0px 20px 20px 20px;"
                                    >
                                        <button type="submit" href="#" class="genric-btn primary-border radius">Cari</button>
                                    </div>
                                </div>

                                <hr>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($users as $user)
                                <div class="col-md-4">
                                    <div class="card shadow-sm"
                                    >
                                        <div class="text-center pt-4">

                                            <img class="card-img-top " alt="avatar1" src="{{ $user->getPhoto() }}"
                                                style="height: 150px; width: auto; margin: 0 auto;
                                             border-radius: 50%; object-fit: cover;" />
                                        </div>
                                        <div class="card-body text-center">

                                            <div class="card-text">
                                                <h5 class="card-title text-center">
                                                    <a
                                                        href="{{ route('user.profile', $user->username) }}">{{ $user->name }}</a>
                                                </h5>
                                                <p>{{ $user->keanggotaan }}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>

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
                                <form action="{{ route("subscribe") }}" method="POST" >
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" onfocus="this.placeholder = ''"
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
