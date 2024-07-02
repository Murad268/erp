<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Exception;

class LogoutService
{
    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return true;
        } catch (Exception $e) {
            // Xətanı log faylına yazmaq üçün
            \Log::error('Logout prosesi zamanı xəta baş verdi: ' . $e->getMessage());
            return false;
        }
    }
}
