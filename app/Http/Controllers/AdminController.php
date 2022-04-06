<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Order;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function adminHome() {
        if (Auth::id()) {
            return view('admin.admindashboard');
        } else {
            return redirect('login');
        }
    }

    public function allUsers() {
        if (Auth::id()) {
            return view('admin.user.index')->with([
                'users'   => User::latest()->paginate(10),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function deleteUser($id) {
        if (Auth::id()) {
            $user = User::find($id);
            $user->delete();

            return redirect()->back()->with('success', "User successfully Delete!");
        } else {
            return redirect('login');
        }
    }

    public function foodMenu() {
        if (Auth::id()) {
            return view('admin.food.index')->with([
                'foods'   => Food::latest()->paginate(10),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function createFood() {
        if (Auth::id()) {
            return view('admin.food.create');
        } else {
            return redirect('login');
        }
    }

    public function foodStore(Request $request) {

        $request->validate([
            'name'        => ['required', 'max:255', 'string'],
            'price'       => ['required', 'integer'],
            'foodimage'   => ['image'],
            'description' => ['required', 'string'],
        ]);

        try {
            $foodimage = null;
            if (!empty($request->file('foodimage'))) {
                $foodimage = time() . '-' . $request->file('foodimage')->getClientOriginalName();
                $request->file('foodimage')->storeAs('public/uploads', $foodimage);
            }

            Food::create([
                'name'        => $request->name,
                'price'       => $request->price,
                'foodimage'   => $foodimage,
                'description' => $request->description,
            ]);

            return redirect()->route('food-menu')->with('success', "Food Added Successfully!");
        } catch (\Throwable $th) {
            return redirect()->route('food-menu')->with('error', $th->getMessage());
        }

    }

    public function editFood($id) {
        if (Auth::id()) {
            return view('admin.food.edit')->with([
                'food'   => Food::find($id),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function updateFood(Request $request, $id) {

        $food = Food::find($id);

        $request->validate([
            'name'        => ['required', 'max:255', 'string'],
            'price'       => ['required', 'integer'],
            'foodimage'   => ['image'],
            'description' => ['required', 'string'],
        ]);

        try {
            $foodimage = $food->foodimage;

            if ( !empty($request->file('foodimage')) ) {
                Storage::delete('public/uploads/'.$foodimage);
                $foodimage = time() . '-' . $request->file('foodimage')->getClientOriginalName();
                $request->file('foodimage')->storeAs('public/uploads', $foodimage);
            }

            $food->update([
                'name'        => $request->name,
                'price'       => $request->price,
                'foodimage'   => $foodimage,
                'description' => $request->description,
            ]);

            return redirect()->route('food-menu')->with('success', "Food Updated!");
        } catch (\Throwable $th) {
            return redirect()->route('food-menu')->with('error', $th->getMessage());
        }

    }

    public function deleteFood($id) {
        if (Auth::id()) {
            $food = Food::find($id);
            Storage::delete('public/uploads/'.$food->foodimage);
            $food->delete();

            return redirect()->back()->with('success', "Food successfully Delete!");
        } else {
            return redirect('login');
        }
    }

    public function viewReservation() {
        if (Auth::id()) {
            return view('admin.reservation')->with([
                'reservations'   => Reservation::latest()->paginate(10),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function approvedReservation() {
        if (Auth::id()) {
            return view('admin.reservation.index');
        } else {
            return redirect('login');
        }
    }

    public function deleteReservation($id) {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->back()->with('success', "Reservation successfully Delete!");
        } else {
            return redirect('login');
        }
    }

    public function allChefs() {
        if (Auth::id()) {
            return view('admin.chef.index')->with([
                'chefs'   => Foodchef::latest()->paginate(10),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function createChef() {
        if (Auth::id()) {
            return view('admin.chef.create');
        } else {
            return redirect('login');
        }
    }

    public function chefStore(Request $request) {

        $request->validate([
            'name'           => ['required', 'max:255', 'string'],
            'specialtie'     => ['required', 'max:255', 'string'],
            'chefimage'      => ['image'],
        ]);

        try {
            $chefimage = null;
            if (!empty($request->file('chefimage'))) {
                $chefimage = time() . '-' . $request->file('chefimage')->getClientOriginalName();
                $request->file('chefimage')->storeAs('public/uploads', $chefimage);
            }

            Foodchef::create([
                'name'           => $request->name,
                'specialtie'     => $request->specialtie,
                'chefimage'      => $chefimage,
                'cheffacebook'   => $request->cheffacebook,
                'cheftwitter'    => $request->cheftwitter,
                'chefbehence'    => $request->chefbehence,
                'chefinstagram'  => $request->chefinstagram,
                'chefgoogleplus' => $request->chefgoogleplus,
            ]);

            return redirect()->route('chefs')->with('success', "Chef Added Successfully!");
        } catch (\Throwable $th) {
            return redirect()->route('chefs')->with('error', $th->getMessage());
        }

    }

    public function editChef($id) {
        if (Auth::id()) {
            return view('admin.chef.edit')->with([
                'chef'   => Foodchef::find($id),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function updateChef(Request $request, $id) {

        $chef = Foodchef::find($id);

        $request->validate([
            'name'           => ['required', 'max:255', 'string'],
            'specialtie'     => ['required', 'max:255', 'string'],
            'chefimage'      => ['image'],
        ]);

        try {
            $chefimage = $chef->chefimage;

            if ( !empty($request->file('chefimage')) ) {
                Storage::delete('public/uploads/'.$chefimage);
                $chefimage = time() . '-' . $request->file('chefimage')->getClientOriginalName();
                $request->file('chefimage')->storeAs('public/uploads', $chefimage);
            }

            $chef->update([
                'name'           => $request->name,
                'specialtie'     => $request->specialtie,
                'chefimage'      => $chefimage,
                'cheffacebook'   => $request->cheffacebook,
                'cheftwitter'    => $request->cheftwitter,
                'chefbehence'    => $request->chefbehence,
                'chefinstagram'  => $request->chefinstagram,
                'chefgoogleplus' => $request->chefgoogleplus,
            ]);

            return redirect()->route('chefs')->with('success', "Chef Updated!");
        } catch (\Throwable $th) {
            return redirect()->route('chefs')->with('error', $th->getMessage());
        }

    }

    public function deleteChef($id) {
        if (Auth::id()) {
            $chef = Foodchef::find($id);
            Storage::delete('public/uploads/'.$chef->chefimage);
            $chef->delete();

            return redirect()->back()->with('success', "Chef successfully Delete!");
        } else {
            return redirect('login');
        }
    }

    public function viewOrder() {
        if (Auth::id()) {
            return view('admin.order')->with([
                'orders'   => Order::latest()->paginate(10),
            ]);
        } else {
            return redirect('login');
        }
    }

    public function searchOrder(Request $request) {
        if (Auth::id()) {
            $search_request = $request->search;
            $search=Order::where('name', 'Like', '%'.$search_request.'%')->orWhere('foodname', 'Like', '%'.$search_request.'%')->get();
            return view('admin.order')->with([
                'orders'   => $search,
            ]);
        } else {
            return redirect('login');
        }
    }

}
