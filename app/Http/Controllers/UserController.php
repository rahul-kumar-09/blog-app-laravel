<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:205', ]
        ]);

        $incomingData['password'] = bcrypt($incomingData['password']);

        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/');        
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingData = $request->validate([
            'loginname' => ['required'],
            'loginpassword' => ['required']
        ]);

        if (auth()->attempt(['name' => $incomingData['loginname'], 'password' => $incomingData['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

}
