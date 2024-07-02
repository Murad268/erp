<?php

namespace App\Services;

class CodeService
{
    function generateRandomCode($length = 16) {
        return bin2hex(random_bytes($length / 2));
    }
}
