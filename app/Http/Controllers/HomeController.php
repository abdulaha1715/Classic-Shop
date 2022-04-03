<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        if (Auth::user()) {
            $usertype = Auth::user()->usertype;
        } else {
            $usertype = 'user';
        }

        if ($usertype == 'admin') {
            return redirect()->route('admin-dashboard');
        } else {
            return view('home');
        }
    }

    public function adminHome() {
        return view('admin.admindashboard');
    }
}
