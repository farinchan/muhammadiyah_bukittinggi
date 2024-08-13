<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-md-block" style="background: linear-gradient(90deg, #2c368b 0%, #01a54d 100%)">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    {{-- <li><img src="{{ asset('front/img/icon/header_icon1.png') }}" alt="">34ºc,
                                        Sunny </li> --}}
                                    <li><img src="{{ asset('front/img/icon/header_icon1.png') }}" alt="">
                                        {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-mid d-none d-md-block">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('front/img/logo/logo.png') }}"
                                    height="70px"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 text-right" id="login1">
                            <a href="{{ route('login') }}" class="genric-btn primary-border circle">
                                <i class="fa-regular fa-right-to-bracket"></i> &nbsp; &nbsp;
                                Login
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9 col-md-12 header-flex">
                            <!-- sticky -->
                            <div class="sticky-logo">
                                <a href="index.html"><img src="{{ asset('front/img/logo/logo.png') }}"
                                    height="70px"
                                        alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route("home") }}">Home</a></li>
                                        <li><a href="#">Profile</a>
                                            <ul class="submenu">
                                                <li><a href="#">Sejarah</a></li>
                                                <li><a href="#">Visi Misi</a></li>
                                                <li><a href="#">Struktur Organisasi</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route("news") }}">Berita</a>
                                            <ul class="submenu">
                                                @php
                                                    $categories = \App\Models\NewsCategory::all();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <li><a href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="#">Asset</a></li>
                                        <li><a href="#">Keanggotaan</a></li>
                                        <li><a href="#">Ortom</a></li>
                                        
                                        <li id="login_mobile" ><a href="#">Login</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 my-3 me-3 ">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search special-tag"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari Ustadz"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- <div class="header-right-btn f-right d-none d-lg-block">
                                <i class="fas fa-search special-tag"></i>
                                <div class="search-box">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        
                                    </form>
                                </div>
                            </div> -->
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-md-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
