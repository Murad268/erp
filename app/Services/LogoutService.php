<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class LogoutService
{
    public function logout()
    {
        try {
            Auth::logout();



            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
