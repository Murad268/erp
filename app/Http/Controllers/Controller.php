<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function executeSafely(callable $callback, $route = null)
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            if ($route) {
                return redirect()->route($route)->with(['error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
            }
            return response()->json(['success' => false, 'error' => 'Bir xəta baş verdi: ' . $e->getMessage()]);
        }
    }
}
