<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect()->to('/admin/login');
        } else if (Auth::user()->role == 1) {
            return redirect()->to('/');
        }

        $users = User::all();
        $userBleyz = $users->where('source', 1)->count();
        $userFB = $users->where('source', 2)->count();

        return view('back-office.index', compact('userBleyz','userFB'));
    }
}
