<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome_user.welcome');
    }

    public function posts(Request $request){
        $cars = Car::when('car')->simplePaginate(5);

        if($request->ajax())
        {
            $output="";
            $products = Car::query()->where($request->brand,$request->car_brand)->get();

            if($products)
            {
                foreach ($products as $key => $product) {
                    $output.=
                        '<div>'.$product->car_brand.'</div>';
                }
                return Response($output);
            }
        }
        return view("welcome_user.all_cars",compact('cars'));
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

    public function error(){
        return view('Auth.posts.error');
    }
}
