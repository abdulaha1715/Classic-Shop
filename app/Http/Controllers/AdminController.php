<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', "User successfully Delete!");
    }

    public function foodMenu() {
        return view('admin.food.index')->with([
            'foods'   => Food::latest()->paginate(10),
        ]);
    }

    public function createFood() {
        return view('admin.food.create');
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
        return view('admin.food.edit')->with([
            'food'   => Food::find($id),
        ]);
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
        $food = Food::find($id);
        $food->delete();

        return redirect()->back()->with('success', "Food successfully Delete!");
    }

    public function viewReservation() {
        return view('admin.reservation.index')->with([
            'reservations'   => Reservation::latest()->paginate(10),
        ]);
    }

    public function approvedReservation() {
        return view('admin.reservation.index');
    }

    public function deleteReservation($id) {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->back()->with('success', "Reservation successfully Delete!");
    }

    public function allChefs() {
        return view('admin.chef.index')->with([
            'chefs'   => Foodchef::latest()->paginate(10),
        ]);
    }

    public function createChef() {
        return view('admin.chef.create');
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

}
