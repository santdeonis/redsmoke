<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Auth\AuthLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request): RedirectResponse
    {
        return AuthService::login($request->getData())
            ? redirect()->back()->with(['success' => __('auth.login.success')])
            : redirect()->back()->with(['error' => __('auth.login.error')]);
    }

    public function logout(): RedirectResponse
    {
        return AuthService::logout()
            ? redirect()->back()->with(['success' => __('auth.logout.success')])
            : redirect()->back()->with(['error' => __('auth.logout.error')]);
    }
}
