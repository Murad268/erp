@extends('layouts.auth-layout')
@push('styles')
    <style>
        .invalid-feedback {
            color: red;
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
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-32">
                        Qeydiyyat
                    </span>
                    <span class="txt1 p-b-11">
                        Tam Ad
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Tam ad mütləqdir">
                        <input class="input100" type="text" name="name" value="{{ old('name') }}">
                        <span class="focus-input100"></span>
                    </div>
                    @error('name')
                    <span class="txt1 p-b-11">
                        Email
                    </span>
                    <div class="wrap-input100 validate-input m-b-36" data-validate="Email mütləqdir">
                        <input class="input100" type="email" name="email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                    <span class="txt1 p-b-11">
                        Şifrə
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Şifrə mütləqdir">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password')
                    <span class="txt1 p-b-11">
                        Şifrə Təkrarı
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Şifrə təkrarı mütləqdir">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password_confirmation">
                        <span class="focus-input100"></span>

                    </div>
                    @error('password_confirmation')
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Qeydiyyatdan Keç
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
