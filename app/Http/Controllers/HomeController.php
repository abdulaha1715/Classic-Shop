<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        // check user type
        if (Auth::user()) {
            $usertype = Auth::user()->usertype;
        } else {
            $usertype = 'user';
        }

        // view return for user type
        if ($usertype == 'admin') {
            return redirect()->route('admin-dashboard');
        } else {
            return view('home')->with([
                'foods'   => Food::all(),
            ]);
        }
    }

    public function reservation(Request $request) {

        $request->validate([
            'name'    => ['required', 'max:255', 'string'],
            'phone'   => ['required', 'string'],
            'email'   => ['required', 'max:255', 'string'],
            'guests'  => ['required', 'max:255', 'string'],
            'date'    => ['required', 'max:255', 'string'],
            'time'    => ['required', 'max:255', 'string'],
            'message' => ['required', 'string'],
        ]);

        // dd($request->all());

        try {
            Reservation::create([
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'guests'  => $request->guests,
                'date'    => $request->date,
                'time'    => $request->time,
                'message' => $request->message,
            ]);



            return redirect()->route('site-url')->with('success', "Reservation Create Successfully!");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }
}
