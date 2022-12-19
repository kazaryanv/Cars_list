<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome_user.welcome');
    }

    public function posts(){
        $guest = Car::all();
        return view("welcome_user.all_cars",compact('guest'));
    }

    public function show($id)
    {
        $car = new Car();
        return view('welcome_user.one_id', ['car'=>$car->findOrFail($id)]);
    }

    public function my_post(){
        $cars = Car::get()->where('user_id',Auth::id());
        return view("Auth.posts.my_post",compact('cars'));
    }

    public function showCategory(Request $request){
       $car = Car::all();

       if ($request->ajax()){
           return $request->orderBy;

       }
       return view('welcome_user.filter',['car' => $car]);
    }
}
