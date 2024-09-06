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
                            <h5 class="card-title">Profile</h5>
                        </div>
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Foto') }}
                                        </label>
                                        <div class="col-md-8">
                                            <image class="shadow-sm"
                                                src="@if (auth()->user()->photo) {{ Storage::url(auth()->user()->photo) }}@else{{ asset('front/img/image_placeholder.jpg') }} @endif"
                                                height="150px" alt="" id="photo_preview" style="cursor: pointer">
                                                <input type="file" accept="image/*" class="form-control" name="photo"
                                                    id="photo" style="display: none"><br>
                                                <small class="text-muted">Klik pada gambar untuk mengganti foto</small>
                                                @error('photo')
                                                    <span class="text-danger" role="alert">
                                                        <small>{{ $message }}</small>
                                                    </span>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Nama Lengkap') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-user"></i></div>
                                                <input type="text" placeholder="Nama Lengkap"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Nama Lengkap'" required=""
                                                    class="single-input @error('name') is-invalid @enderror" name="name"
                                                    value="{{ $user->name }}" autocomplete="name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="jenis_kelamin"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Jenis Kelamin') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-venus-mars"></i></div>
                                                <select name="gender" id="gender"
                                                    class="single-input form-select required">
                                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-laki"
                                                        @if ($user->gender == 'Laki-laki') selected @endif>
                                                        Laki-laki</option>
                                                    <option value="Perempuan"
                                                        @if ($user->gender == 'Perempuan') selected @endif> Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-md-3 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir') }}

                                        </label>
                                        <div class="col-md-3">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-map-marker-alt"></i></div>
                                                <input type="text" placeholder="Tempat Lahir"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Tempat Lahir'" required=""
                                                    class="single-input @error('place_of_birth') is-invalid @enderror"
                                                    name="place_of_birth" value="{{ $user->place_of_birth }}"
                                                    autocomplete="place_of_birth">
                                            </div>
                                            @error('place_of_birth')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-calendar"></i></div>
                                                <input type="date" placeholder="Tanggal Lahir"
                                                    onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Tanggal Lahir'" required=""
                                                    class="single-input @error('date_of_birth') is-invalid @enderror"
                                                    name="birth_date" value="{{ $user->birth_date }}"
                                                    autocomplete="date_of_birth">
                                            </div>
                                            @error('date_of_birth')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="No. HP"
                                            class="col-md-3 col-form-label text-md-right">{{ __('No. HP') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-phone"></i></div>
                                                <input type="text" placeholder="No. HP"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'No. HP'"
                                                    required=""
                                                    class="single-input @error('phone') is-invalid @enderror"
                                                    name="phone" value="{{ $user->phone }}" autocomplete="phone">
                                            </div>
                                            @error('phone')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Alamat"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Alamat') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-location-arrow"></i></div>
                                                <textarea type="text" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
                                                    required="" class="single-input @error('address') is-invalid @enderror" name="address" autocomplete="address"
                                                    rows="3">{{ $user->address }}</textarea>
                                            </div>
                                            @error('address')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Pekerjaan"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Pekerjaan') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-briefcase"></i></div>
                                                <select id="job" class="reset-style select2" name="job[]"
                                                    multiple="multiple" required>
                                                    <option
                                                        value="Ustadz"@if ($user->job == 'Ustadz') selected @endif>
                                                        Ustadz</option>
                                                    <option
                                                        value="Dosen"@if ($user->job == 'Dosen') selected @endif>
                                                        Dosen</option>
                                                    <option
                                                        value="Guru"@if ($user->job == 'Guru') selected @endif>
                                                        Guru</option>
                                                    <option
                                                        value="Arsitek"@if ($user->job == 'Arsitek') selected @endif>
                                                        Arsitek</option>
                                                    <option
                                                        value="Nelayan"@if ($user->job == 'Nelayan') selected @endif>
                                                        Nelayan</option>
                                                    <option
                                                        value="Perawat"@if ($user->job == 'Perawat') selected @endif>
                                                        Perawat</option>
                                                    <option
                                                        value="Dokter"@if ($user->job == 'Dokter') selected @endif>
                                                        Dokter</option>
                                                    <option
                                                        value="Bidan"@if ($user->job == 'Bidan') selected @endif>
                                                        Bidan</option>
                                                    <option
                                                        value="Pemadam Kebakaran"@if ($user->job == 'Pemadam Kebakaran') selected @endif>
                                                        Pemadam Kebakaran</option>
                                                    <option
                                                        value="Kondektur"@if ($user->job == 'Kondektur') selected @endif>
                                                        Kondektur</option>
                                                    <option
                                                        value="Pilot"@if ($user->job == 'Pilot') selected @endif>
                                                        Pilot</option>
                                                    <option
                                                        value="Masinis"@if ($user->job == 'Masinis') selected @endif>
                                                        Masinis</option>
                                                    <option
                                                        value="Wartawan"@if ($user->job == 'Wartawan') selected @endif>
                                                        Wartawan</option>
                                                    <option
                                                        value="Penulis"@if ($user->job == 'Penulis') selected @endif>
                                                        Penulis</option>
                                                    <option
                                                        value="Insinyur Mesin"@if ($user->job == 'Insinyur Mesin') selected @endif>
                                                        Insinyur Mesin</option>
                                                    <option
                                                        value="Ahli Gizi"@if ($user->job == 'Ahli Gizi') selected @endif>
                                                        Ahli Gizi</option>
                                                    <option
                                                        value="Pustakawan"@if ($user->job == 'Pustakawan') selected @endif>
                                                        Pustakawan</option>
                                                    <option
                                                        value="Hakim"@if ($user->job == 'Hakim') selected @endif>
                                                        Hakim</option>
                                                    <option
                                                        value="Notaris"@if ($user->job == 'Notaris') selected @endif>
                                                        Notaris</option>
                                                    <option
                                                        value="Teller Bank"@if ($user->job == 'Teller Bank') selected @endif>
                                                        Teller Bank</option>
                                                    <option
                                                        value="Koki"@if ($user->job == 'Koki') selected @endif>
                                                        Koki</option>
                                                    <option
                                                        value="Artis"@if ($user->job == 'Artis') selected @endif>
                                                        Artis</option>
                                                    <option
                                                        value="Penerjemah"@if ($user->job == 'Penerjemah') selected @endif>
                                                        Penerjemah</option>
                                                    <option
                                                        value="Tentara"@if ($user->job == 'Tentara') selected @endif>
                                                        Tentara</option>
                                                    <option
                                                        value="Tukang Cukur"@if ($user->job == 'Tukang Cukur') selected @endif>
                                                        Tukang Cukur</option>
                                                    <option
                                                        value="Petani"@if ($user->job == 'Petani') selected @endif>
                                                        Petani</option>
                                                    <option
                                                        value="Akuntan"@if ($user->job == 'Akuntan') selected @endif>
                                                        Akuntan</option>
                                                    <option
                                                        value="Pengacara"@if ($user->job == 'Pengacara') selected @endif>
                                                        Pengacara</option>
                                                    <option
                                                        value="Polisi"@if ($user->job == 'Polisi') selected @endif>
                                                        Polisi</option>
                                                    <option
                                                        value="Pegawai Negeri"@if ($user->job == 'Pegawai Negeri') selected @endif>
                                                        Pegawai Negeri</option>
                                                    <option
                                                        value="Pegawai Swasta"@if ($user->job == 'Pegawai Swasta') selected @endif>
                                                        Pegawai Swasta</option>
                                                    <option
                                                        value="Wiraswasta"@if ($user->job == 'Wiraswasta') selected @endif>
                                                        Wiraswasta</option>
                                                    <option
                                                        value="Lainnya"@if ($user->job == 'Lainnya') selected @endif>
                                                        Lainnya</option>
                                                </select>
                                            </div>
                                            @error('job')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="kepakaran"></div>

                                    <div class="form-group row">
                                        <label for="Keanggotaan"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Keanggotaan') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-user"></i></div>
                                                <select name="keanggotaan" id="keanggotaan"
                                                    class="single-input form-select @error('keanggotaan') is-invalid @enderror"
                                                    required>
                                                    <option value="" disabled selected>Pilih Keanggotaan</option>
                                                    <option value="Kader Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Kader Muhammadiyah') selected @endif>
                                                        Kader Muhammadiyah</option>
                                                    <option value="Warga Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Warga Muhammadiyah') selected @endif>
                                                        Warga Muhammadiyah</option>
                                                    <option value="Simpatisan Muhammadiyah"
                                                        @if ($user->keanggotaan == 'Simpatisan Muhammadiyah') selected @endif>
                                                        Simpatisan Muhammadiyah</option>
                                                </select>
                                            </div>
                                            @error('keanggotaan')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                                                <input type="text" placeholder="Email" onfocus="this.placeholder = ''"
                                                    onblur="this.placeholder = 'Email'" required=""
                                                    class="single-input @error('email') is-invalid @enderror"
                                                    name="email" value="{{$user->email }}" autocomplete="email">
                                            </div>
                                            @error('email')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-3 col-form-label text-md-right">{{ __('Password') }}

                                        </label>
                                        <div class="col-md-8">
                                            <div class="input-group-icon">
                                                <div class="icon"><i class="fa-regular fa-lock-alt"></i></div>
                                                <input type="password" placeholder="Password"
                                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"
                                                    class="single-input @error('password') is-invalid @enderror"
                                                    name="password" autocomplete="current-password">
                                            </div>
                                            <small class="text-muted">Kosongkan jika tidak ingin mengganti password</small>
                                            @error('password')
                                                <span class="text-danger" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="{{ route('user.kajian') }}"
                                    class="genric-btn default radius">Batal</button>
                                <button type="submit" class="genric-btn success radius">Upadate Profile</button>
                            </div>
                        </form>
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
