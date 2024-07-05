<?php

namespace App\Http\Controllers;

use App\Http\Repositories\UserRepository;
use App\Mail\VerifyEmail;
use App\Services\CodeService;
use App\Services\CrudService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function __construct(public UserRepository $userRepository, public CrudService $crudService, public CodeService $codeService) {}

    public function index() {
        try {
            return view('auth.login');
        } catch (Exception $e) {
            Log::error('Login səhifəsi göstərilərkən xəta baş verdi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function login(Request $request) {
        try {
            $credentials = $request->only('email', 'password');
            $remember = $request->has('remember-me');

            $user = $this->userRepository->getByEmail($credentials['email']);

            if (!$user) {
                return redirect()->back()->with('error', 'İstifadəçi adı və ya şifrə yanlışdır.');
            }

            if (is_null($user->email_verified_at)) {
                $activation_token = $this->codeService->generateRandomCode();
                $this->crudService->update($user, ['activate_token' => $activation_token]);


                Mail::to($user->email)->send(new VerifyEmail($activation_token, $user->id));
                return redirect()->back()->with('error', 'Email hələ aktiv edilməyib. Zəhmət olmasa, emailinizi doğrulayın. Təstiqləmə linki yenidən sizə göndərildi');
            }

            if (Auth::attempt($credentials, $remember)) {
                return redirect()->intended('/');
            }

            return redirect()->back()->with('error', 'İstifadəçi adı və ya şifrə yanlışdır.');
        } catch (Exception $e) {
            Log::error('Login prosesi zamanı xəta baş verdi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Login prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }
}
