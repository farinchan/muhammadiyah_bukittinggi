@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('news') }}">
    <link rel="canonical" href="{{ route('news') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('content')
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                @if (request()->routeIs('news.category'))
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <h2 class="mb-3" style="background-color: #f8faf8; padding: 10px; border-radius: 5px;">
                                <i class="fas fa-tags"></i> {{ $category->name }}
                            </h2>
                        </div>
                    </div>
                @endif
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach ($list_news as $news)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{ Storage::url($news->thumbnail) }}"
                                        alt="" height="300px" width="100%" style="object-fit: cover;">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ $news->created_at->format('d') }}</h3>
                                        <p>{{ $news->created_at->format('M') }} </p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{ route('news.detail', $news->slug) }}">
                                        <h2>{{ $news->title }}</h2>
                                    </a>
                                    <p>{{ Str::limit(strip_tags($news->content), 170, '...') }}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="{{ route('keanggotaan.detail', $news->user?->id) }}"><i
                                                    class="fa fa-user"></i> {{ $news->user?->name }}</a></li>
                                        <li><a href="{{ route('news.category', $news->category?->slug) }}"><i
                                                    class="fas fa-tags"></i> {{ $news->category?->name }}</a>
                                        </li>
                                        <li><a href="#"><i class="fa fa-comments"></i> {{ $news->comments->count() }}
                                                Komentar</a></li>

                                        <li><a href="#"><i class="fa fa-eye"></i>
                                                {{ $news->viewers->count() }}
                                                Kali Dilihat</a>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach


                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">

                                @if ($list_news->onFirstPage())
                                    <li class="page-item disabled">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a href="{{ route('news', ['page' => $list_news->currentPage() - 1, 'q' => request()->q]) }}"
                                            class="page-link" aria-label="Previous">
                                            <i class="ti-angle-left"></i>
                                        </a>
                                    </li>
                                @endif

                                @php
                                    // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                                    $start = max($list_news->currentPage() - 2, 1);
                                    $end = min($start + 4, $list_news->lastPage());
                                @endphp

                                @if ($start > 1)
                                    <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                @endif

                                @foreach ($list_news->getUrlRange($start, $end) as $page => $url)
                                    @if ($page == $list_news->currentPage())
                                        <li class="page-item active">
                                            <a href="#" class="page-link">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link"
                                                href="{{ route('news', ['page' => $page, 'q' => request()->q]) }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                @if ($end < $list_news->lastPage())
                                    <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                                    <li class="page-item">
                                        <a class="page-link">...</a>
                                    </li>
                                @endif

                                @if ($list_news->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link"
                                            href="{{ route('news', ['page' => $list_news->currentPage() + 1, 'q' => request()->q]) }}" aria-label="Next">
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
                                        <input name="q" type="text" class="form-control" placeholder='Cari Berita'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Berita'"
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
