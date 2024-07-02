@extends('layouts.auth-layout')
@push('styles')
    <style>
        .invalid-feedback {
            color: red;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .status-message {
            color: green;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
@endpush
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
                @sessionMessages
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-32">
                        Sistemə giriş
                    </span>
                    <span class="txt1 p-b-11">
                        İstifadəçi Adı
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="İstifadəçi adı mütləqdir">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        @error('email')
                    </div>
                    <span class="txt1 p-b-11">
                        Şifrə
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Şifrə mütləqdir">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        @error('password')
                    </div>
                    <div class="flex-sb-m w-full p-b-48">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Məni xatırla
                            </label>
                        </div>
                        <div>
                            <a href="{{route('reset-password-input-email')}}" class="txt3">
                                Şifrəni unutmusunuz?
                            </a>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Daxil Ol
                        </button>
                    </div>
                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Hesabınız yoxdur?
                        </span>
                        <a href="{{ route('register-form') }}" class="txt2 bo1">
                            Qeydiyyatdan keçin
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
