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
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('reset-password-send-to-email') }}">
                    @csrf
                    <span class="txt1 p-b-11">
                        elektron poçtunuzu daxil edin
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="İstifadəçi adı mütləqdir">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        @error('email')
                    </div>
                    <span class="txt1 p-b-11">
                        Şifrə
                    </span>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Davam et
                        </button>
                    </div>
                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Artıq hesabınız var?
                        </span>
                        <a href="{{ route('login') }}" class="txt2 bo1">
                            Daxil Olun
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
