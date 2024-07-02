<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Services\CodeService;
use App\Services\CrudService;
use App\Services\LogoutService;
use App\Services\MailService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Modules\User\Http\Requests\UserNewEmailRequest;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        public UserRepository $userRepository,
        public CodeService $codeService,
        public MailService $mailService,
        public CrudService $crudService,
        public LogoutService $logoutService,
    ) {
    }
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('user::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        try {
            $data = $request->all();
            $this->crudService->update($user, $data);
            return redirect()->back()->with('status', 'Məlumatlar uğurla yeniləndi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Məlumatlar yenilənərkən xəta baş verdi. Zəhmət olmasa yenidən cəhd edin.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function send_email_password_reset(Request $request)
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Şifrə sıfırlama prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }

    public function new_email()
    {
        return view('user::new-email');
    }

    public function send_new_email(UserNewEmailRequest $request) {
        try {
            $activation_token = $this->codeService->generateRandomCode();
            $user = $this->userRepository->getByEmail(auth()->user()->email);
            $this->crudService->update($user, ['email_verified_at' => null, 'email'=>$request->email, 'activate_token' => $activation_token]);
            Mail::to($user->email)->send(new VerifyEmail($activation_token, $user->id));
            return redirect()->route('login')->with('status', 'Qeydiyyat uğurla tamamlandı! Emailinizi doğrulamaq üçün link yeni poçtunuza göndərildi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Qeydiyyat prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }
}
