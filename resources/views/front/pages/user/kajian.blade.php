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
        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
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
                        <div class="card-header">
                            <h5 class="card-title">Kajian</h5>
                        </div>
                        <div class="card-body">
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
                                                        <i class="fa-regular fa-eye"></i> {{ $kajian->kajianViewer->count() }} Dilihat |
                                                        <i class="fa-regular fa-calendar"></i>
                                                        {{ $kajian->created_at->format('d M Y') }}
                                                    </small>
                                                    <p>{{ Str::limit(strip_tags($kajian->content), 200) }}</p>
                                                </td>
                                                <td>
                                                    <a style="padding: 0 15px;" href="{{ route('user.kajian.edit', $kajian->id) }}"
                                                        class="genric-btn warning-border circle"><i
                                                            class="fa-regular fa-pen-to-square"></i></a>
                                                    <a style="padding: 0 15px;" href="#" data-toggle="modal" data-target="#deleteModal{{ $kajian->id }}"
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

    @foreach ($list_kajian as $kajian)
        <div class="modal fade" id="deleteModal{{ $kajian->id }}" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="deleteModalLabel">Hapus Kajian</h6>
                    </div>
                    <div class="modal-body text-start">
                        Apakah Anda yakin ingin menghapus kajian ini? <br>
                        <strong>{{ $kajian->title }}</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="genric-btn info-border " data-dismiss="modal">Batal</button>
                        <form action="{{ route('user.kajian.destroy', $kajian->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="genric-btn danger-border radius">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
