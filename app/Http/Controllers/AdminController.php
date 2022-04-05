<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'name'       => ['required', 'max:255', 'string'],
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

            return redirect()->route('admin.food.index')->with('success', "Food Added Successfully!");
        } catch (\Throwable $th) {
            return redirect()->route('admin.food.index')->with('error', $th->getMessage());
        }

    }

    public function deleteFood($id) {
        $food = Food::find($id);
        $food->delete();

        return redirect()->back()->with('success', "Food successfully Delete!");
    }

}
