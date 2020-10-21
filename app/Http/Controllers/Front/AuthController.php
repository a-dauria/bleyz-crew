<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLog() {
        if (!Auth::check()) {
            return view('login');
        } else {
            return redirect()->to('/');
        }
    }

    public function viewReg() {
        if (!Auth::check()) {
            return view('register');
        } else {
            return redirect()->to('/');
        }
    }

    public function register(Request $request) {
        $user = User::create([
            'email' => $request->mailReg,
            'username' => $request->usernameReg,
            'password' => bcrypt($request->passReg),
            'source' => ($request->isFb == 1 ? 2 : 1),
            'role' => 1
        ]);
    }

    public function login(Request $request) {
        $user = User::where(function($query) use($request) {
            $query->where('email', $request->emailLog)->orWhere('username', $request->usernameLog);
        })->where('password', bcrypt($request->passLog));

        if (!$user) {
            return redirect()->back();
        }

        Auth::login($user);
        return redirect()->to('/');
    }
}
