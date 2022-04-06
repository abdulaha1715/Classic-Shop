<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodcart;
use App\Models\Foodchef;
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
            $user_id = Auth::id();
            $count   = Foodcart::where('user_id', $user_id)->count();
            return view('home')->with([
                'foods'   => Food::all(),
                'chefs'   => Foodchef::all(),
                'count'   => $count,
                'id'   => $user_id,
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

    public function foodCart(Request $request, $id) {
        if (Auth::id()) {
            $user_id = Auth::id();
            $food_id = $id;

            $request->validate([
                'quantity' => ['required', 'max:255', 'string'],
            ]);

            try {
                Foodcart::create([
                    'user_id'  => $user_id,
                    'food_id'  => $food_id,
                    'quantity' => $request->quantity,
                ]);

                return redirect()->back()->with('success', "Food add to cart Successfully!");
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', $th->getMessage());
            }
        } else {
            return redirect('/login');
        }
    }

    public function showCart(Request $request, $id) {
        $user_id = Auth::id();
        $count   = Foodcart::where('user_id', $user_id)->count();
        $cart    = Foodcart::where('user_id', $user_id)->join('food', 'foodcarts.food_id', "=", 'food.id')->get();
        return view('show-cart')->with([
            'count'   => $count,
            'carts'   => $cart,
        ]);
    }
}
