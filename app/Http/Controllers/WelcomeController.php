<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome_user.welcome');
    }

    public function cars(Request $request){
        $filterBrands = $request->get('car_brand',[]);
        $cars = Car::query()->when(!empty($filterBrands), function ($query) use ($filterBrands){
            $query->whereIn('car_brand',$filterBrands);
        })->get();

        if($request->ajax())
        {
            $output="";
            if($cars)
            {
                foreach ($cars as $car)
                $output .=  view('welcome_user.filter',['car' => $car]);
                return Response($output);
            }
        }
        return view("welcome_user.all_cars",compact('cars'));
    }

    public function show($id)
    {
        $car = Car::query()->findOrFail($id);
        return view('welcome_user.one_id', compact('car'));
    }

    public function error(){
        return view('Auth.posts.error');
    }
}
