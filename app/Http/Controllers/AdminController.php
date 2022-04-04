<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function adminHome() {
        return view('admin.admindashboard');
    }
    
    public function allUsers() {
        return view('admin.user.index')->with([
            'users'   => User::latest()->paginate(10),
        ]);
    }

    public function delete_user($id) {
        $user = User::find($id);
        $user->delete();
        
        return redirect()->back()->with('success', "User successfully Delete!");
    }
}
