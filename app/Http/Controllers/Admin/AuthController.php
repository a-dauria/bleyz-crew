<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        if (Auth::check()) {
            return redirect()->to('/admin');
        }
    }

    public function viewLogin () {
        return view('back-office.login');
    }

    public function login(Request $request) {
        $user = User::where(function($query) use($request) {
            $query->where('login', $request->login)->orWhere('email', $request->login);
        })->where('password', bcrypt($request->password))->first();

        if (!$user) {
            return redirect()->back()->with('erreur', 'Aucun compte trouvé avec ces identifiants');
        }

        Auth::login($user);
        return redirect()->to('/admin');
    }
}
