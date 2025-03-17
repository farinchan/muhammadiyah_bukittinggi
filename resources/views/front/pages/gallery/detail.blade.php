@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('gallery.detail',  $album->slug) }}">
    <link rel="canonical" href="{{ route('gallery.detail', $album->slug) }}">
    <meta property="og:image" content="{{ Storage::url($album->image) }}">
@endsection

@section('styles')
@endsection

@section('content')
    <main class="mt-5 mb-5">
        <div class="whole-wrap">
            <div class="container box_1170">
                <div class="section-top-border">

                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $album->getThumbnail() }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-9 mt-sm-20">
                            <h3 class="mb-30">{{ $album->title }}</h3>
                            <p>{{ $album->description }}</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="section-top-border">
                    <h3>Galeri Foto</h3>
                    <div class="row gallery-item">
                        @forelse ($galleries as $galery)
                            <div class="col-md-4">
                                <a href="{{ $galery->getFoto() }}" class="img-pop-up">
                                    <div class="single-gallery-image" style="background: url({{ $galery->getFoto() }});"></div>
                                </a>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p>Belum ada foto</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
