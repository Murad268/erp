<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\RegisterService;
use Illuminate\Support\Facades\Log;
use Exception;

class RegisterController extends Controller
{
    public function __construct(public RegisterService $registerService, public UserRepository $userRepository)
    {
        //
    }

    public function index() {
        try {
            return view('auth.register');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function register(RegisterRequest $request) {
        try {
            $this->registerService->register($request);
            return redirect()->route('login')->with('status', 'Qeydiyyat uğurla tamamlandı! Emailinizi doğrulamaq üçün link göndərildi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Qeydiyyat prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function verified($token, $user_id) {
        try {
            $user = $this->userRepository->getFromEmail($token, $user_id);
            if (!$user) {
                return redirect()->route('login')->with('error', 'Doğrulama tokeni etibarsızdır.');
            }
            $this->registerService->reset($user);
            return redirect()->route('login')->with('status', 'Email uğurla doğrulandı! İndi daxil ola bilərsiniz.');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Doğrulama prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }
}
