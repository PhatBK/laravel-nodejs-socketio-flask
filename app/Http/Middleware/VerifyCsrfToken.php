<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * Những route không cần phải validate csrf token
     * @var array
     */
    protected $except = [
        'api/handler/recommended/result/v1'
    ];
}
