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

        table{
            margin: 10px 30px;
        }
        .card-title{
            font-size: 1.5rem;
            font-weight: 500;
            font-style: normal;
            font-family: 'Roboto', sans-serif;
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
                            <span class="card-title">
                                Data Diri
                            </span>
                            <a class="text-primary" href="{{ route('user.profile.edit') }}" style="float: right;">
                                <i class="fa-solid fa-user-pen"></i>
                                Edit Profile</a>
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
                                        <th scope="row">Tempat, Tanggal Lahir</th>
                                        <td>{{ $user->place_of_birth }}, {{ $user->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. Telepon</th>
                                        <td>{{ $user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Provinsi</th>
                                        <td>{{ $user->province }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kota/Kabupaten</th>
                                        <td>{{ $user->city }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kecamatan</th>
                                        <td>{{ $user->district }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Kelurahan/Kenagarian</th>
                                        <td>{{ $user->village }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Alamat</th>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pekerjaan</th>
                                        @php 
                                        $job = json_decode($user->job??'[]');
                                        @endphp
                                        <td>
                                            <ul class="unordered-list">
                                                @foreach ($job as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    @if ($user->job == 'Ustadz')
                                        <tr>
                                            <th scope="row">Kepakaran</th>
                                            <td>{{ $user->expertise }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Foto</th>
                                        <td>
                                            <img src="{{ $user->getPhoto() }}" alt="Foto" style="width: 100px; height: auto;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
    
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#photo_preview').click(function() {
            $('#photo').click();
        });

        $('#photo').change(function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#photo_preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $('#job').select2({
            placeholder: "Pilih Pekerjaan",
            // theme: 'bootstrap4'
        });

        $('#job').on('change', function() {
            var data = $(this).val();
            if (data.includes('Ustadz')) {
                $('#kepakaran').html(`
                    <div class="form-group row">
                        <label for="Kepakaran" class="col-md-3 col-form-label text-success text-md-right">{{ __('Kepakaran') }}
                            
                        </label>
                        <div class="col-md-8">
                            <div class="input-group-icon">
                                <div class="icon"><i class="fa-regular fa-brain-circuit"></i></div>
                                <select name="kepakaran" id="kepakaran"
                                    class="form-select single-input @error('kepakaran') is-invalid @enderror" required>
                                    <option value="" disabled selected>Pilih Kepakaran</option>
                                    <option value="Tafsir">Tafsir</option>
                                    <option value="Hadist">Hadist</option>
                                    <option value="Fiqih">Fiqih</option>
                                    <option value="Aqidah">Aqidah</option>
                                    <option value="Tarikh">Tarikh</option>
                                </select>
                            </div>
                            @error('kepakaran')
                                <span class="text-danger" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                `);
            } else {
                $('#kepakaran').html('');
            }
        });
    </script>
@endsection
