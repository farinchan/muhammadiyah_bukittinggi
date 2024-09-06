@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('contact') }}">
    <link rel="canonical" href="{{ route('contact') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <style>
        .search-box {
            max-width: 700px;
            margin: 70px auto;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            border: none;
            padding: 30px;
            font-size: 18px;
            width: 100%;
            outline: none;
        }

        .search-box .btn {
            color: #fff;
            padding: 10px 10px;
            border-radius: 30px;
            border: none;
        }

        .search-box input:focus {
            box-shadow: none;
        }

        .search-box .input-group-append {
            border: none;
        }

        .btn {
            min-width: 100px;
        }

        .card {
            border: none;
            border-radius: 0;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .card-title a:hover {
            color: #01a54d;
        }

    </style>
@endsection

@section('content')
    <!-- ================ contact section start ================= -->
    <section class="mt-5 mb-5">
        <div class="container">
            <form action="{{ route('ustadz.search') }}" method="GET">
                <div class="search-box input-group">
                    <input type="text" class="form-control" name="q" placeholder="Cari Ustadz..." value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>


            @forelse ($list_ustadz as $ustadz)
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title text-center">Profil Ustadz</h5>
                            </div>
                            <div class="text-center pt-4">

                                <img class="card-img-top " alt="avatar1" src="{{ $ustadz->getPhoto() }}"
                                    style="height: 150px; width: auto; margin: 0 auto;
                             border-radius: 50%; object-fit: cover;" />
                            </div>
                            <div class="card-body text-center">

                                <div class="card-text">
                                    <h5 class="card-title text-center">
                                        <a href="{{ route('keanggotaan.detail', $ustadz->id) }}">{{ $ustadz->name }}</a>
                                    </h5>
                                    <p>{{ $ustadz->keanggotaan }}</p>
                                    <hr>
                                    <p>
                                        <strong>Bidang Kajian:</strong> {{ $ustadz->kepakaran }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title">Publikasi Kajian Ustadz</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    @forelse  ($ustadz->kajian as $kajian)
                                        @if ($loop->iteration <= 3)
                                            <div class="card " style="width: 100%; border:none;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <a href="{{ route('kajian.detail', $kajian->slug) }}">
                                                                <h5 class="card-title">{{ $kajian->title }}</h5>
                                                            </a>
                                                            <ul class="blog-info-link">
                                                                <li>
                                                                    <a href="#"><i class="fa fa-user"></i>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($loop->iteration == 3)
                                            <div class="card " style="width: 100%; border:none;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-12">
                                                        <div class="card-body">
                                                            <a href="" class="text-info">Lihat Semua Kajian >></a>
                                                            {{-- <a href="{{ route('ustadz.detail', $ustadz->slug) }}"
                                                                class="text-info">Lihat Semua Kajian >></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @empty
                                        <div class="alert alert-warning" role="alert">
                                            Ustadz ini belum memiliki kajian
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning" role="alert">
                    Ustadz tidak ditemukan
                </div>

            @endforelse
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

@section('scripts')
@endsection
