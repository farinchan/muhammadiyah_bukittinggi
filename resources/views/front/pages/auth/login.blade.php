@extends('front.app')

@section('seo')
@endsection

@section('content')
    <main class="my-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <form method="POST" action="{{ route('login.process') }}">
                        @csrf

                        <div class="text-center pb-5">
                            <h2>Login</h2>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                                    <input type="text" placeholder="Email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Email'" required=""
                                        class="single-input @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" autocomplete="email">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fa-regular fa-lock-alt"></i></div>
                                    <input type="password" placeholder="Password" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Password'" required=""
                                        class="single-input @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="row">
                                    <div class="col">
                                        {{-- <div class="switch-wrap d-flex">
                                            <div class="primary-checkbox mr-3">
                                                <input type="checkbox" id="default-checkbox" name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label for="default-checkbox"></label>
                                            </div>
                                            Ingat Saya
                                        </div> --}}
                                    </div>
                                    <div class="col text-right">
                                        <a class="text-info" href="{{ route("forgot.password") }}">Lupa Password?</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="genric-btn primary circle ">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <p class="text-center mt-3">Belum punya akun? <a class="text-info" href="{{ route('register') }}">Daftar
                                disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
