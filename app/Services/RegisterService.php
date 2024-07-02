<?php

namespace App\Services;

use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    public function __construct(public CodeService $codeService)
    {
        //
    }

    public function register(Request $request) {
        $activation_token = $this->codeService->generateRandomCode();
        $data = $request->all();
        $data['activate_token'] = $activation_token;
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Mail::to($user->email)->send(new VerifyEmail($activation_token, $user->id));
    }

    public function reset(User $user)
    {

        $user->email_verified_at = now();
        $user->activate_token = null;
        $user->save();
    }
}
