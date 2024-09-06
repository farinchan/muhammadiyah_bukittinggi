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
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <style>
        h5 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0;
        }

        .card {
            border-radius: 10px;
            border: none;
        }

        p {
            font-size: 1rem;
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 1.25rem 0.75rem;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }

        table {
            margin: 10px 30px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 500;
            font-style: normal;
            font-family: 'Roboto', sans-serif;
        }
    </style>
@endsection

@section('content')
    @php
        $job = json_decode($user->job ?? '[]');
    @endphp
    <main class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            {{-- <h4 class="card-title text-center">Profile</h4> --}}
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ $user->getPhoto() }}"
                                        class="img-fluid" alt="profile" style=" width: auto; height: 200px; ">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <span class="card-title">
                                Data Diri
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td>{{ $user->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>

                                        <td>
                                            <ul class="unordered-list">
                                                @foreach ($job as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @if (collect($job)->contains('Ustadz'))
                                        <tr>
                                            <th scope="row">Bidang Kajian</th>
                                            <td>{{ $user->kepakaran }}</td>
                                        </tr>
                                    @endif
                                    

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
            @if (collect($job)->contains('Ustadz'))
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <span class="card-title text-center">
                                    Publikasi Kajian Ustadz
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                    @forelse ($user->kajian as $kajian)
                                        <div class="card mb-5" style="width: 100%; border:none;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                    <img style="border-radius: 10px; object-fit: cover; width: 100%; height: 220px;"
                                                        src="{{ Storage::url($kajian->thumbnail) }}" alt="Event Image">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body"><a
                                                            href="{{ route('kajian.detail', $kajian->slug) }}">

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
                                                            {{ Str::limit(strip_tags($kajian->content), 260, '...') }}
                                                        </p>
                                                        <p class="card-text"><small
                                                                class="text-muted">{{ $kajian->created_at->diffForHumans() }}</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="card " style="width: 100%; border:none;">
                                            <div class="row no-gutters">
                                                <div class="col-md-12">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">Belum ada kajian yang
                                                            dipublikasikan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </main>
@endsection

@section('scripts')
@endsection
