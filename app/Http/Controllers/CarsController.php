<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Car::all();
        return view("Auth.home",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Auth.posts.update_post");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $paths = [];
        if ($request->hasFile('logo')) {
            foreach ($request->file('logo') as $index => $item) {
                $paths[]= $request->logo[$index]->store('post','public');
            }
            $userId = Auth::check() ? Auth::id() : true;
            $store = Car::create([
                'user_id' => $userId,
                'logo' => $paths,
                'car_brand' => $request->car_brand,
                'car_model' => $request->car_model,
                'car_years' => $request->car_years,
                'car_Engine_capacity' => $request->car_Engine_capacity,
                'car_Transmission' => $request->car_Transmission,
                'content' => $request['content'],
            ]);
            if ($store) {
                return redirect()->route('cars.index')->with('success', 'Post created successfully');
            } else {
                return redirect()->route(back())->with('fail', 'fail');
            }

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('Auth.posts.one_post',['car'=> $car]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('Auth.posts.update_post',['cars'=> $car]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cars = Car::query()->findOrFail($id);
        $cars->car_brand = $request->input('logo[]');
        $cars->car_brand = $request->input('car_brand');
        $cars->car_model = $request->input('car_model');
        $cars->car_years = $request->input('car_years');
        $cars->car_Engine_capacity = $request->input('car_Engine_capacity');

        if ($request->hasfile('logo')) {
            if ($logo = $cars->logo) {
                Storage::disk('public')->delete($logo);
            }
            $paths = [];
            if ($request->hasFile('logo')) {
                foreach ($request->file('logo') as $index => $item) {
                    $paths[] = $request->logo[$index]->store('post', 'public');
                }
//            $file = $request->file('logo');
//            $extension = $request->logo->getClientOriginalExtension();
//            $fileName = uniqid() . '.' . $extension;
//            $file->move(public_path().'/storage/',$fileName);
//            $data = $fileName;
            $cars->logo = $paths;
            }
            if ($cars->save()) {
                return redirect()->route('cars.index')->with('success', 'Row successfully created');
            } else {
                return redirect()->route(back())->with('fail', 'fail');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =  Car::query()->findOrFail($id);
            $file_name = $delete->logo;
           foreach ($file_name as $index) {
               $file_path = public_path('storage/'. $index);
               unlink($file_path);
          }
        $delete->delete();
        if($delete->delete()) {
            return redirect()->route('cars.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('cars.index')->with('fail','Deleted fail');
        }
    }
}
