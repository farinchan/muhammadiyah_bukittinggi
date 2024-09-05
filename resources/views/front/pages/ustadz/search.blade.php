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
@endsection

@section('content')
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">
            @foreach ($list_ustadz as $ustadz)
                <div class="row">
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="text-center pt-4">

                                <img class="card-img-top " alt="avatar1" src="{{ $ustadz->getPhoto() }}"
                                    style="height: 150px; width: auto; margin: 0 auto;
                             border-radius: 50%; object-fit: cover;" />
                            </div>
                            <div class="card-body text-center">

                                <div class="card-text">
                                    <h5 class="card-title text-center">
                                        <a href="">{{ $ustadz->name }}</a>
                                    </h5>
                                    <p>{{ $ustadz->keanggotaan }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="card-text">
                                    @foreach ($ustadz->kajian as $kajian)
                                        <div class="card " style="width: 100%; border:none;">
                                            <div class="row no-gutters">
                                                <div class="col-md-12">
                                                    <div class="card-body"><a
                                                            href="{{ route('kajian.detail', $kajian->slug) }}
                                                        ">

                                                            <h5 class="card-title">{{ $kajian->title }}</h5>
                                                        </a>
                                                        <ul class="blog-info-link">
                                                            <li><a href="#"><i class="fa fa-user"></i> Admin Garis
                                                                    Kode</a>
                                                            </li>
                                                            <li><a href="#"><i class="fas fa-tags"></i> Putusan</a>
                                                            </li>
                                                            <li><a href="#"><i class="fa fa-comments"></i> 3
                                                                    Komentar</a></li>
                                                        </ul>
                                                        <p class="card-text">
                                                            {{ Str::limit(strip_tags($kajian->content), 160, '...') }}
                                                        </p>
                                                        <p class="card-text"><small class="text-muted">{{ $kajian->created_at->diffForHumans() }}</small></p>
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
    </section>
    <!-- ================ contact section end ================= -->
@endsection

@section('scripts')
@endsection
