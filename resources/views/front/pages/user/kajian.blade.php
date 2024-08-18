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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />

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
    </style>
@endsection

@section('content')
    <main class="my-5">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    @include('front.pages.user.__sidebar')

                </div>
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Dashboard</h4>
                            <div class="card-body">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kajian</th>
                                            <th scope="col" style="width: 117px;">Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <div class="btn-group " role="group" aria-label="Basic example">
                                            <a href="{{ route("user.kajian.create") }}"  class="genric-btn default"><i class="fa-solid fa-plus"></i> Buat Kajian</a>
                                            <a  class="genric-btn default"><i class="fa-regular fa-file-export"></i> Eksport</a>
                                          </div>
                                        @foreach ($list_kajian as $kajian)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <p class="font-weight-bold">{{ $kajian->title }}</p>
                                                    <small style="color: #6c757d; margin-bottom: 10px;">
                                                        <i class="fa-regular fa-comments"></i>
                                                        {{ $kajian->kajianComment->count() }} Komentar |
                                                        <i class="fa-regular fa-eye"></i> Dilihat |
                                                        <i class="fa-regular fa-calendar"></i>
                                                        {{ $kajian->created_at->format('d M Y') }}
                                                    </small>
                                                    <p>{{ Str::limit(strip_tags($kajian->content), 200) }}</p>
                                                </td>
                                                <td>
                                                    <a style="padding: 0 15px;" href="#"
                                                        class="genric-btn warning-border circle"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a style="padding: 0 15px;" href="#"
                                                        class="genric-btn danger-border circle"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script>
        $('#datatable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true,
            "order": [
                [0, "asc"]
            ],
            "columnDefs": [{
                "orderable": false,
                "targets": 2
            }],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak ditemukan",
                "infoFiltered": "(filter dari _MAX_ total data)",
                "search": "Cari:",
            },
            "lengthMenu": [5, 10, 25, 50, 75, 100],


        });
    </script>
@endsection
