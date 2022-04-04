<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function adminHome() {
        return view('admin.admindashboard');
    }
    
    public function allUsers() {
        return view('admin.user.index');
    }
}
