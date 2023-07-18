<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Users\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function store(UserCreateRequest $request): RedirectResponse
    {
        $data = $request->toArray();
        User::create([
            'username' => $data['username'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 2,
        ]);
        return redirect()->route('web.main.index')->with(['success' => __('auth.created')]);
    }
}
