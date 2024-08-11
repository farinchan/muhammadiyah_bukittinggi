@extends('front.app')
@section('seo')
@endsection
@section('content')
    <main class="my-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-9">
                    <form method="POST" action="{{ route('register.process') }}">
                        @csrf
                        <div class="text-center pb-5">
                            <h2>Pendaftaran</h2>
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
                                    <select name="gender" id="jenis_kelamin" class="single-input form-select required">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                        class="single-input @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}"
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
                                        value="{{ old('address') }}" autocomplete="address" rows="3"></textarea>
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
                                    <select name="job" id="job" class="reset-style select2" name="categories[]"
                                        multiple="multiple" required>
                                        <option value="Ustadz">Ustadz</option>
                                        <option value="Dosen">Dosen</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Arsitek">Arsitek</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Perawat">Perawat</option>
                                        <option value="Dokter">Dokter</option>
                                        <option value="Bidan">Bidan</option>
                                        <option value="Pemadam Kebakaran">Pemadam Kebakaran</option>
                                        <option value="Kondektur">Kondektur</option>
                                        <option value="Pilot">Pilot</option>
                                        <option value="Masinis">Masinis</option>
                                        <option value="Wartawan">Wartawan</option>
                                        <option value="Penulis">Penulis</option>
                                        <option value="Insinyur Mesin">Insinyur Mesin</option>
                                        <option value="Ahli Gizi">Ahli Gizi</option>
                                        <option value="Pustakawan">Pustakawan</option>
                                        <option value="Hakim">Hakim</option>
                                        <option value="Notaris">Notaris</option>
                                        <option value="Teller Bank">Teller Bank</option>
                                        <option value="Koki">Koki</option>
                                        <option value="Artis">Artis</option>
                                        <option value="Penerjemah">Penerjemah</option>
                                        <option value="Tentara">Tentara</option>
                                        <option value="Tukang Cukur">Tukang Cukur</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Akuntan">Akuntan</option>
                                        <option value="Pengacara">Pengacara</option>
                                        <option value="Polisi">Polisi</option>
                                        <option value="Pegawai Negeri">Pegawai Negeri</option>
                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Lainnya">Lainnya</option>
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
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                    <select name="keanggotaan" id="keanggotaan"
                                        class="single-input form-select @error('keanggotaan') is-invalid @enderror" required>
                                        <option value="" disabled selected>Pilih Keanggotaan</option>
                                        <option value="Kader Muhammadiyah">Kader Muhammadiyah</option>
                                        <option value="Warga Muhammadiyah">Warga Muhammadiyah</option>
                                        <option value="Simpatisan Muhammadiyah">Simpatisan Muhammadiyah</option>
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
                                            Saya menyetujui &nbsp;<a class="text-info" href="#"> Syarat dan
                                                Ketentuan</a> &nbsp; Keanggotaan Muhammadiyah
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="genric-btn primary circle ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <h3>
                        Informasi
                    </h3>
                    <p>
                        Dengan membuat akun, Anda dapat mengakses semua fitur yang ada di website kami. Jadi, tunggu
                        apalagi?
                        Daftar sekarang!
                    </p>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#job').select2({
            placeholder: "Pilih Pekerjaan / Kepakaran",
            // theme: 'bootstrap4'
        });

        $('#job').on('change', function() {
            var data = $(this).val();
            if (data.includes('Ustadz')) {
                $('#kepakaran').html(`
                    <div class="form-group row">
                        <label for="Kepakaran" class="col-md-3 col-form-label text-success text-md-right">{{ __('Kepakaran') }}
                            <span class="text-danger">*</span>
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
            }
        });
    </script>
@endsection
