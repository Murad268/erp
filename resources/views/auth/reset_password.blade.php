@extends('layouts.auth-layout')
@push('title') şifrəni sıfırla @endpush
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
                <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('reset-password') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <span class="login100-form-title p-b-32">
                        Şifrəni Yenilə
                    </span>
                    <span class="txt1 p-b-11">
                        Yeni Şifrə
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Yeni şifrə mütləqdir">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        @error('password')
                    </div>
                    <span class="txt1 p-b-11">
                        Yeni Şifrə Təkrarı
                    </span>
                    <div class="wrap-input100 validate-input m-b-12" data-validate="Yeni şifrə təkrarı mütləqdir">
                        <span class="btn-show-pass">
                            <i class="fa fa-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password_confirmation">
                        <span class="focus-input100"></span>
                        @error('password_confirmation')
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Şifrəni Yenilə
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
@endsection
