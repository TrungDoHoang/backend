<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;

class AuthController extends Controller
{
    protected $authService;

    public function __construct()
    {
        // Dependency injection : Không phải tạo đối tượng, gán object cung cấp cho 1 object
    }

    public function login(AuthRequest $request)
    {

        dd("Login Controller", $request);
    }
}
