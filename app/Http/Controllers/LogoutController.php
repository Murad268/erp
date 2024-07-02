<?php

namespace App\Http\Controllers;

use App\Services\LogoutService;
use Illuminate\Http\Request;
use Exception;

class LogoutController extends Controller
{
    public function __construct(public LogoutService $logoutService)
    {
    }

    public function logout(Request $request)
    {
        try {
            $result = $this->logoutService->logout($request);
            if ($result) {
                return redirect('/login');
            } else {
                return redirect()->back()->with('error', 'Çıxış prosesi zamanı xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.');
        }
    }
}
