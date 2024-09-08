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
    </style>
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <div class="row ">


                            @foreach ($list_kajian as $kajian)
                                {{-- <div class="card">
                                <div class="card-image">
                                    <img src="{{ Storage::url($kajian->thumbnail) }}" alt="Event Image">
                                    <span class="badge">CORPORATE</span>
                                </div>
                                <div class="card-content">
                                    <p class="date">25 Jan 2020</p>
                                    <h5 class="card-title">Welcome To The Best Model Winner Contest</h5>
                                </div>
                            </div> --}}

                                <div class="card mb-5" style="width: 100%; border:none;">
                                    <div class="row no-gutters">
                                        <div class="col-md-5 d-flex justify-content-center align-items-center">
                                            <img style="border-radius: 10px; object-fit: cover; width: 100%; height: 220px;"
                                                src="{{ Storage::url($kajian->thumbnail) }}" alt="Event Image">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="card-body"><a
                                                    href="{{ route('kajian.detail', $kajian->slug) }}
                                                ">

                                                    <h5 class="card-title">{{ $kajian->title }}</h5>
                                                </a>
                                                <ul class="blog-info-link">
                                                    <li>
                                                        <a href="{{ route('keanggotaan.detail', $kajian->user?->id) }}"><i
                                                                class="fa fa-user"></i>
                                                            {{ $kajian->user->name }}</a>
                                                    </li>

                                                    <li><a href="#"><i class="fa fa-comments"></i>
                                                            {{ $kajian->kajianComment->count() }}
                                                            Komentar</a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-eye"></i>
                                                            {{ $kajian->kajianViewer->count() }}
                                                            Kali Dilihat</a>
                                                    </li>
                                                </ul>
                                                <p class="card-text">
                                                    {{ Str::limit(strip_tags($kajian->content), 160, '...') }}
                                                </p>
                                                <p class="card-text"><small
                                                        class="text-muted">{{ $kajian->created_at->diffForHumans() }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                @if ($list_kajian->onFirstPage())
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a href="{{ route('kajian', ['page' => $list_kajian->currentPage() - 1, 'q' => request()->q]) }}"
                                            class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                @endif

                                @php
                                    // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                    $start = max($list_kajian->currentPage() - 2, 1);
                                    $end = min($start + 4, $list_kajian->lastPage());
                                @endphp

                                @if ($start > 1)
                                    <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                @endif

                                @foreach ($list_kajian->getUrlRange($start, $end) as $page => $url)
                                    @if ($page == $list_kajian->currentPage())
                                        <li class="page-item active">
                                            <a href="#" class="page-link">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ route('kajian', ['page' => $page, 'q' => request()->q]) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($end < $list_kajian->lastPage())
                                    <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                @endif

                                @if ($list_kajian->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ route('kajian', ['page' => $list_kajian->currentPage() + 1, 'q' => request()->q]) }}"
                                            aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <i class="ti-angle-right"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input name="q" type="text" class="form-control" placeholder='Cari Kajian'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Kajian'"
                                            value="{{ request()->q }}">
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
                            @foreach ($latest_kajian as $kajianNew)
                                <div class="media post_item">
                                    <img src="{{ Storage::url($kajianNew->thumbnail) }}" alt="post" width="100px"
                                        height="80px" style="object-fit: cover;">
                                    <div class="media-body ">
                                        <a href="{{ route('news.detail', $kajianNew->slug) }}">
                                            <h3>{{ $kajianNew->title }}</h3>
                                        </a>
                                        <p>{{ $kajianNew->created_at->format('d M Y') }}</p>
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
    </section>
    <!--================Blog Area =================-->
@endsection
