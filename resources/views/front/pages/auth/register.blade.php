@extends('front.app')
@section('seo')
@endsection
@section('styles')
    <style>
        .icon {
            z-index: -10000;
        }

        .icon i {
            z-index: -10000;
        }

        p a {
            color: #0B863E
        }

        .about {
            text-align: justify;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        td {
            vertical-align: top;
        }

        .td_about {
            padding-right: 10px;
        }
    </style>
@endsection
@section('content')
    <main class="my-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('register.process') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center pb-5">
                            <h2>Pendaftaran</h2>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Foto') }}
                            </label>
                            <div class="col-md-8">
                                <image class="shadow-sm" src="{{ asset('front/img/image_placeholder.jpg') }}" height="150px"
                                    alt="" id="photo_preview" style="cursor: pointer">
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
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nama Lengkap') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    <input type="text" placeholder="Nama Lengkap" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Nama Lengkap'" required=""
                                        class="single-input @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name">
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
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-venus-mars"></i></div>
                                    <select name="gender" id="gender" class="single-input form-select required">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @if (old('gender') == 'Laki-laki') selected @endif>
                                            Laki-laki</option>
                                        <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif>
                                            Perempuan </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right">{{ __('Tempat, Tanggal Lahir') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-3">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map-marker-alt"></i></div>
                                    <input type="text" placeholder="Tempat Lahir" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Tempat Lahir'" required=""
                                        class="single-input @error('place_of_birth') is-invalid @enderror"
                                        name="place_of_birth" value="{{ old('place_of_birth') }}"
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
                                    <input type="date" placeholder="Tanggal Lahir" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Tanggal Lahir'" required=""
                                        class="single-input @error('birth_date') is-invalid @enderror" name="birth_date"
                                        value="{{ old('birth_date') }}" autocomplete="birth_date">
                                </div>
                                @error('birth_date')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Provinsi" class="col-md-3 col-form-label text-md-right">{{ __('Provinsi') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map"></i></div>
                                    <input type="text" placeholder="Provinsi" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Provinsi'" required=""
                                        class="single-input @error('province') is-invalid @enderror" name="province"
                                        value="{{ old('province') }}" autocomplete="province">
                                </div>
                                @error('province')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Kabupaten/Kota"
                                class="col-md-3 col-form-label text-md-right">{{ __('Kabupaten/Kota') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map"></i></div>
                                    <input type="text" placeholder="Kabupaten/Kota" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Kabupaten/Kota'" required=""
                                        class="single-input @error('city') is-invalid @enderror" name="city"
                                        value="{{ old('city') }}" autocomplete="city">
                                </div>
                                @error('city')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Kecamatan" class="col-md-3 col-form-label text-md-right">{{ __('Kecamatan') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map"></i></div>
                                    <input type="text" placeholder="Kecamatan" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Kecamatan'" required=""
                                        class="single-input @error('district') is-invalid @enderror" name="district"
                                        value="{{ old('district') }}" autocomplete="district">
                                </div>
                                @error('district')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Kenagarian/Kelurahan"
                                class="col-md-3 col-form-label text-md-right">{{ __('Kenagarian/Kelurahan') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map"></i></div>
                                    <input type="text" placeholder="Kenagarian/Kelurahan"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Kenagarian/Kelurahan'"
                                        required="" class="single-input @error('village') is-invalid @enderror"
                                        name="village" value="{{ old('village') }}" autocomplete="village">
                                </div>
                                @error('village')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- 
                        <div class="form-group row">
                            <label for="Koordinat" class="col-md-3 col-form-label text-md-right">{{ __('Koordinat') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map-marker-alt"></i></div>
                                    <input type="text" placeholder="Latitude" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Latitude'" required=""
                                        class="single-input @error('latitude') is-invalid @enderror" name="latitude"
                                        value="{{ old('latitude') }}" autocomplete="latitude">
                                </div>
                                @error('latitude')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-map-marker-alt"></i></div>
                                    <input type="text" placeholder="Longitude" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Longitude'" required=""
                                        class="single-input @error('longitude') is-invalid @enderror" name="longitude"
                                        value="{{ old('longitude') }}" autocomplete="longitude">
                                </div>
                                @error('longitude')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}




                        <div class="form-group row">
                            <label for="No. HP" class="col-md-3 col-form-label text-md-right">{{ __('No. HP') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-phone"></i></div>
                                    <input type="text" placeholder="No. HP" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'No. HP'" required=""
                                        class="single-input @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" autocomplete="phone">
                                </div>
                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Alamat" class="col-md-3 col-form-label text-md-right">{{ __('Alamat') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-location-arrow"></i></div>
                                    <textarea type="text" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat'"
                                        required="" class="single-input @error('address') is-invalid @enderror" name="address"
                                        autocomplete="address" rows="3">{{ old('address') }}</textarea>
                                </div>
                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Pekerjaan" class="col-md-3 col-form-label text-md-right">{{ __('Pekerjaan') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-briefcase"></i></div>
                                    <select id="job" class="reset-style select2" name="job[]"
                                        multiple="multiple" required>
                                        <option value="Ustadz"@if (old('job') == 'Ustadz') selected @endif>Ustadz
                                        </option>
                                        <option value="Dosen"@if (old('job') == 'Dosen') selected @endif>Dosen
                                        </option>
                                        <option value="Guru"@if (old('job') == 'Guru') selected @endif>Guru
                                        </option>
                                        <option value="Arsitek"@if (old('job') == 'Arsitek') selected @endif>Arsitek
                                        </option>
                                        <option value="Nelayan"@if (old('job') == 'Nelayan') selected @endif>Nelayan
                                        </option>
                                        <option value="Perawat"@if (old('job') == 'Perawat') selected @endif>Perawat
                                        </option>
                                        <option value="Dokter"@if (old('job') == 'Dokter') selected @endif>Dokter
                                        </option>
                                        <option value="Bidan"@if (old('job') == 'Bidan') selected @endif>Bidan
                                        </option>
                                        <option
                                            value="Pemadam Kebakaran"@if (old('job') == 'Pemadam Kebakaran') selected @endif>
                                            Pemadam Kebakaran</option>
                                        <option value="Kondektur"@if (old('job') == 'Kondektur') selected @endif>
                                            Kondektur</option>
                                        <option value="Pilot"@if (old('job') == 'Pilot') selected @endif>Pilot
                                        </option>
                                        <option value="Masinis"@if (old('job') == 'Masinis') selected @endif>Masinis
                                        </option>
                                        <option value="Wartawan"@if (old('job') == 'Wartawan') selected @endif>
                                            Wartawan</option>
                                        <option value="Penulis"@if (old('job') == 'Penulis') selected @endif>Penulis
                                        </option>
                                        <option value="Insinyur Mesin"@if (old('job') == 'Insinyur Mesin') selected @endif>
                                            Insinyur Mesin</option>
                                        <option value="Ahli Gizi"@if (old('job') == 'Ahli Gizi') selected @endif>Ahli
                                            Gizi</option>
                                        <option value="Pustakawan"@if (old('job') == 'Pustakawan') selected @endif>
                                            Pustakawan</option>
                                        <option value="Hakim"@if (old('job') == 'Hakim') selected @endif>Hakim
                                        </option>
                                        <option value="Notaris"@if (old('job') == 'Notaris') selected @endif>Notaris
                                        </option>
                                        <option value="Teller Bank"@if (old('job') == 'Teller Bank') selected @endif>
                                            Teller Bank</option>
                                        <option value="Koki"@if (old('job') == 'Koki') selected @endif>Koki
                                        </option>
                                        <option value="Artis"@if (old('job') == 'Artis') selected @endif>Artis
                                        </option>
                                        <option value="Penerjemah"@if (old('job') == 'Penerjemah') selected @endif>
                                            Penerjemah</option>
                                        <option value="Tentara"@if (old('job') == 'Tentara') selected @endif>Tentara
                                        </option>
                                        <option value="Tukang Cukur"@if (old('job') == 'Tukang Cukur') selected @endif>
                                            Tukang Cukur</option>
                                        <option value="Petani"@if (old('job') == 'Petani') selected @endif>Petani
                                        </option>
                                        <option value="Akuntan"@if (old('job') == 'Akuntan') selected @endif>Akuntan
                                        </option>
                                        <option value="Pengacara"@if (old('job') == 'Pengacara') selected @endif>
                                            Pengacara</option>
                                        <option value="Polisi"@if (old('job') == 'Polisi') selected @endif>Polisi
                                        </option>
                                        <option value="Pegawai Negeri"@if (old('job') == 'Pegawai Negeri') selected @endif>
                                            Pegawai Negeri</option>
                                        <option value="Pegawai Swasta"@if (old('job') == 'Pegawai Swasta') selected @endif>
                                            Pegawai Swasta</option>
                                        <option value="Wiraswasta"@if (old('job') == 'Wiraswasta') selected @endif>
                                            Wiraswasta</option>
                                        <option value="Lainnya"@if (old('job') == 'Lainnya') selected @endif>Lainnya
                                        </option>
                                    </select>
                                </div>
                                @error('job')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="kepakaran" style="width: 100% !important;">
                            <div class="form-group row">
                                <label for="Kepakaran"
                                    class="col-md-3 col-form-label text-success text-md-right">{{ __('Bidang Kajian') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-8">
                                    <div class="input-group-icon">
                                        <div class="icon"><i class="fa-regular fa-brain-circuit"></i></div>
                                        <select name="kepakaran[]" id="kepakaran_select2" class="reset-style select2"
                                            multiple="multiple">
                                            <option value="Tafsir">Tafsir</option>
                                            <option value="Hadist">Hadist</option>
                                            <option value="Fiqih">Fiqih</option>
                                            <option value="Aqidah">Aqidah</option>
                                            <option value="Tarikh">Tarikh</option>
                                            <option value="Akhlak">Akhlak</option>
                                            <option value="Tasawuf">Tasawuf</option>
                                            <option value="Ekonomi Syariah">Ekonomi Syariah</option>
                                            <option value="Keislamaan">Keislamaan</option>
                                            <option value="Filsafat Islam">Filsafat Islam</option>
                                        </select>
                                    </div>
                                    @error('kepakaran')
                                        <span class="text-danger" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Keanggotaan"
                                class="col-md-3 col-form-label text-md-right">{{ __('Keanggotaan') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    <select name="keanggotaan" id="keanggotaan"
                                        class="single-input form-select @error('keanggotaan') is-invalid @enderror"
                                        required>
                                        <option value="" disabled selected>Pilih Keanggotaan</option>
                                        <option value="Kader Muhammadiyah"
                                            @if (old('keanggotaan') == 'Kader Muhammadiyah') selected @endif>
                                            Kader Muhammadiyah</option>
                                        <option value="Warga Muhammadiyah"
                                            @if (old('keanggotaan') == 'Warga Muhammadiyah') selected @endif>
                                            Warga Muhammadiyah</option>
                                        <option value="Simpatisan Muhammadiyah"
                                            @if (old('keanggotaan') == 'Simpatisan Muhammadiyah') selected @endif>
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

                        <div class="form-group row">
                            <label for="Memiliki KTAM"
                                class="col-md-3 col-form-label text-md-right">{{ __('Memiliki KTAM') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-id-card"></i></div>
                                    <select name="ktam" id="ktam"
                                        class="single-input form-select @error('ktam') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih </option>
                                        <option value="Ada" @if (old('ktam') == 'Ada') selected @endif>Ada
                                        </option>
                                        <option value="Tidak Ada" @if (old('ktam') == 'Tidak Ada') selected @endif>Tidak
                                            Ada</option>
                                    </select>
                                </div>
                                @error('ktam')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="NBM" class="col-md-3 col-form-label text-md-right">{{ __('NBM') }}

                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-id-card"></i></div>
                                    <input type="text" placeholder="NBM" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'NBM'"
                                        class="single-input @error('nbm') is-invalid @enderror" name="nbm"
                                        value="{{ old('nbm') }}" autocomplete="nbm">
                                </div>
                                @error('nbm')
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
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                                    <input type="text" placeholder="Email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Email'" required=""
                                        class="single-input @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-lock-alt"></i></div>
                                    <input type="password" placeholder="Password" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Password'" required=""
                                        class="single-input @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="switch-wrap d-flex">
                                            <div class="primary-checkbox mr-3">
                                                <input type="checkbox" id="default-checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label for="default-checkbox"></label>
                                            </div>
                                            Saya menyetujui Syarat dan
                                            Ketentuan Keanggotaan Muhammadiyah
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="genric-btn primary circle ">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">

                   
                    <br>

                    <h3>
                        Syarat dan Ketentuan
                    </h3>
                    <p>
                        {!! $setting_web->terms_conditions !!}
                    </p>

                    <br>
                    <h3>
                        Kontak Kami
                    </h3>
                    <p>
                    <table>
                        <tr>
                            <td class="td_about"><i class="fa-regular fa-envelope"></i></td>
                            <td>:</td>
                            <td>{{ $setting_web->email }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-phone"></i></td>
                            <td>:</td>
                            <td>{{ $setting_web->phone }}</td>
                        </tr>
                        <tr>
                            <td><i class="fa-regular fa-map"></i></td>
                            <td>:</td>
                            <td>{{ $setting_web->address }}</td>
                        </tr>
                    </table>
                    </p>
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
        $(document).ready(function() {
            $('#kepakaran').hide();
        });
        $('#job').select2({
            placeholder: "Pilih Pekerjaan",
            // theme: 'bootstrap4'
        });

        $('#kepakaran_select2').select2({
            placeholder: "Pilih Kepakaran",
            // theme: 'bootstrap4'
        });

        $('#job').on('change', function() {
            var data = $(this).val();
            if (data.includes('Ustadz')) {
                $('#kepakaran').show();
            } else {
                $('#kepakaran').hide();
            }
        });
    </script>
@endsection
