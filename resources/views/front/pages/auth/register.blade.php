@extends('front.app')
@section('seo')
@endsection
@section('content')
    <main class="my-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-9">
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
                                        <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif> Perempuan </option>
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
                                    <select name="job" id="job" class="reset-style select2"
                                        name="categories[]" multiple="multiple" required>
                                        <option value="Ustadz"@if (old('job') == 'Ustadz') selected @endif >Ustadz</option>
                                        <option value="Dosen"@if (old('job') == 'Dosen')>Dosen</option>
                                        <option value="Guru"@if (old('job') == 'Guru')>Guru</option>
                                        <option value="Arsitek"@if (old('job') == 'Arsitek')>Arsitek</option>
                                        <option value="Nelayan"@if (old('job') == 'Nelayan')>Nelayan</option>
                                        <option value="Perawat"@if (old('job') == 'Perawat')>Perawat</option>
                                        <option value="Dokter"@if (old('job') == 'Dokter')>Dokter</option>
                                        <option value="Bidan"@if (old('job') == 'Bidan')>Bidan</option>
                                        <option value="Pemadam Kebakaran"@if (old('job') == 'Pemadam Kebakaran')>Pemadam Kebakaran</option>
                                        <option value="Kondektur"@if (old('job') == 'Kondektur')>Kondektur</option>
                                        <option value="Pilot"@if (old('job') == 'Pilot')>Pilot</option>
                                        <option value="Masinis"@if (old('job') == 'Masinis')>Masinis</option>
                                        <option value="Wartawan"@if (old('job') == 'Wartawan')>Wartawan</option>
                                        <option value="Penulis"@if (old('job') == 'Penulis')>Penulis</option>
                                        <option value="Insinyur Mesin"@if (old('job') == 'Insinyur Mesin')>Insinyur Mesin</option>
                                        <option value="Ahli Gizi"@if (old('job') == 'Ahli Gizi')>Ahli Gizi</option>
                                        <option value="Pustakawan"@if (old('job') == 'Pustakawan')>Pustakawan</option>
                                        <option value="Hakim"@if (old('job') == 'Hakim')>Hakim</option>
                                        <option value="Notaris"@if (old('job') == 'Notaris')>Notaris</option>
                                        <option value="Teller Bank"@if (old('job') == 'Teller Bank')>Teller Bank</option>
                                        <option value="Koki"@if (old('job') == 'Koki')>Koki</option>
                                        <option value="Artis"@if (old('job') == 'Artis')>Artis</option>
                                        <option value="Penerjemah"@if (old('job') == 'Penerjemah')>Penerjemah</option>
                                        <option value="Tentara"@if (old('job') == 'Tentara')>Tentara</option>
                                        <option value="Tukang Cukur"@if (old('job') == 'Tukang Cukur')>Tukang Cukur</option>
                                        <option value="Petani"@if (old('job') == 'Petani')>Petani</option>
                                        <option value="Akuntan"@if (old('job') == 'Akuntan')>Akuntan</option>
                                        <option value="Pengacara"@if (old('job') == 'Pengacara')>Pengacara</option>
                                        <option value="Polisi"@if (old('job') == 'Polisi')>Polisi</option>
                                        <option value="Pegawai Negeri"@if (old('job') == 'Pegawai Negeri')>Pegawai Negeri</option>
                                        <option value="Pegawai Swasta"@if (old('job') == 'Pegawai Swasta')>Pegawai Swasta</option>
                                        <option value="Wiraswasta"@if (old('job') == 'Wiraswasta')>Wiraswasta</option>
                                        <option value="Lainnya"@if (old('job') == 'Lainnya')>Lainnya</option>
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
                                        class="single-input form-select @error('keanggotaan') is-invalid @enderror"
                                        required>
                                        <option value="" disabled selected>Pilih Keanggotaan</option>
                                        <option value="Kader Muhammadiyah" @if (old('keanggotaan') == 'Kader Muhammadiyah') selected @endif>
                                            Kader Muhammadiyah</option>
                                        <option value="Warga Muhammadiyah" @if (old('keanggotaan') == 'Warga Muhammadiyah') selected @endif>
                                            Warga Muhammadiyah</option>
                                        <option value="Simpatisan Muhammadiyah" @if (old('keanggotaan') == 'Simpatisan Muhammadiyah') selected @endif>
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
                                    {{ __('Register') }}
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
            } else {
                $('#kepakaran').html('');
            }
        });
    </script>
@endsection
