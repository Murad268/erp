<?php

namespace App\Http\Controllers;

use App\Services\CodeService;
use App\Http\Requests\Passwords\SendToEmailRequest;
use App\Http\Requests\Passwords\ResetRequest;
use App\Http\Repositories\UserRepository;
use App\Services\CrudService;
use App\Services\LogoutService;
use App\Services\MailService;
use Illuminate\Support\Facades\Log;
use Exception;

class ForgotPasswordController extends Controller
{
    public function __construct(
        public UserRepository $userRepository,
        public CodeService $codeService,
        public MailService $mailService,
        public CrudService $crudService,
        public LogoutService $logoutService,
    ) {
    }

    public function input_email()
    {
        try {
            return view('auth.input_email_for_reset');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function send_to_email(SendToEmailRequest $request)
    {
        try {
            $user = $this->userRepository->getByEmail($request->email);
            if (!$user) {
                return redirect()->back()->with('error', 'Belə emailli istifadəçi yoxdur.');
            }

            $token = $this->codeService->generateRandomCode();
            $this->crudService->update($user, ['reset_token' => $token]);
            $this->mailService->sendMail('emails.reset-password', ['token' => $token, 'user' => $user], $user->email, 'Şifrəni sıfırlama');
            $this->logoutService->logout();
            return redirect()->route('login')->with('status', 'Şifrəni sıfırlama linki emailinizə göndərildi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Şifrə sıfırlama prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function showResetForm($token)
    {
        try {
            $user = $this->userRepository->getByToken($token);

            if (!$user) {
                return redirect()->route('password.request')->with('error', 'Yanlış token və ya email.');
            }

            return view('auth.reset_password')->with(['token' => $token, 'email' => $user->email]);
        } catch (Exception $e) {
            return redirect()->route('password.request')->with('error', 'Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function reset(ResetRequest $request)
    {
        try {
            $user = $this->userRepository->getByEmail($request->email);

            if (!$user || $user->reset_token !== $request->token) {
                return redirect()->back()->with('error', 'Yanlış token və ya email.');
            }

            $this->crudService->update($user, [
                'password' => bcrypt($request->password),
                'reset_token' => null,
            ]);

            return redirect()->route('login')->with('status', 'Şifrə uğurla yeniləndi.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Şifrə sıfırlama prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }
}
