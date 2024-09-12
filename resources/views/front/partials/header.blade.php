<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-md-block"
                style="background: linear-gradient(90deg, #2c368b 0%, #01a54d 100%)">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    {{-- <li><img src="{{ asset('front/img/icon/header_icon1.png') }}" alt="">34ºc,
                                        Sunny </li> --}}
                                    <li><img src="{{ asset('front/img/icon/header_icon1.png') }}" alt="">
                                        {{ \Carbon\Carbon::now()->translatedFormat('l, j F Y') }} /
                                        {{ \Alkoumi\LaravelHijriDate\Hijri::Date('l d F Y') }}
                                    </li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    @if ($setting_web->facebook)
                                        <li><a href="{{ $setting_web->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting_web->instagram)
                                        <li><a href="{{ $setting_web->instagram }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting_web->twitter)
                                        <li><a href="{{ $setting_web->twitter }}"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    @endif
                                    @if ($setting_web->youtube)
                                        <li><a href="{{ $setting_web->youtube }}"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    @endif

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
                                <a href="{{ route('home') }}"><img src="{{ Storage::url($setting_web->logo) }}"
                                        width="200px" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9 col-md-9 text-right" id="login1">
                            @auth
                                <a href="
                                @if (Auth::user()->hasRole('admin')) {{ route('admin.dashboard') }}
                                @else
                                    {{ route('user.profile') }} @endif
                                "
                                    class="genric-btn primary-border circle">
                                    <i class="far fa-user"></i> &nbsp; &nbsp;
                                    {{ Auth::user()->name }}
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="genric-btn primary-border circle">
                                    <i class="fa-solid fa-user-plus"></i></i> &nbsp; &nbsp;
                                    Register
                                </a>&nbsp;&nbsp;
                                <a href="{{ route('login') }}" class="genric-btn primary-border circle">
                                    <i class="fa-regular fa-right-to-bracket"></i> &nbsp; &nbsp;
                                    Login
                                </a>
                            @endauth

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
                                <a href="{{ route('home') }}"><img src="{{ Storage::url($setting_web->logo) }}"
                                        width="200px" alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu d-none d-md-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="#">Profile</a>
                                            <ul class="submenu">
                                                @php
                                                    $profiles = \App\Models\Profile::all();
                                                @endphp
                                                @foreach ($profiles as $profile)
                                                    <li><a
                                                            href="{{ route('profile', $profile->slug) }}">{{ $profile->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('news') }}">Berita</a>
                                            <ul class="submenu">
                                                @php
                                                    $categories = \App\Models\NewsCategory::all();
                                                @endphp
                                                @foreach ($categories as $category)
                                                    <li><a
                                                            href="{{ route('news.category', $category->slug) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('kajian') }}">Kajian</a></li>
                                        <li><a href="{{ route('asset') }}">Asset</a></li>
                                        <li><a href="{{ route('keanggotaan') }}">Keanggotaan</a></li>
                                        <li><a href="#">Ortom</a>
                                            <ul class="submenu">
                                                @php
                                                    $list_ortom = \App\Models\OrganisasiOtonom::all();
                                                @endphp
                                                @foreach ($list_ortom as $ortom)
                                                    <li><a
                                                            href="{{ route('ortom', $ortom->slug) }}">{{ $ortom->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('contact') }}">Kontak</a></li>

                                        <div id="login_mobile" >
                                            @auth
                                                <li>
                                                    <a
                                                        href="@if (Auth::user()->hasRole('admin')) {{ route('admin.dashboard') }}@else{{ route('user.profile') }} @endif">
                                                        <i class="far fa-user"></i> &nbsp; &nbsp;
                                                        {{ Auth::user()->name }}
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('register') }}"><i
                                                            class="fa-solid fa-user-plus"></i>&nbsp; &nbsp;
                                                        Register
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('login') }}"><i
                                                            class="fa-regular fa-right-to-bracket"></i>&nbsp; &nbsp;
                                                        Login
                                                    </a>
                                                </li>

                                            @endauth
                                        </div>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 my-3 me-3 ">
                            {{-- <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-search special-tag"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Cari Ustadz"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div> --}}
                            <div class="input-group-icon mt-10 pr-5">
                                <div class="icon"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                                </div>
                                <form action="{{ route('ustadz.search') }}" method="GET">
                                    <input type="text" name="q" placeholder="Cari Ustadz"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Ustadz'"
                                        value="{{ request()->q }}" required="" class="single-input">
                                    {{-- <button type="submit" class="btn btn-primary">Cari</button> --}}
                                </form>
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
