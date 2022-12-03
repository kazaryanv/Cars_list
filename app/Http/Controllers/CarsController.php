<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{

    public function index()
    {
        $carList = Car::all();
        return view("admin.dashboard",compact('carList'));

    }


    public function create()
    {
        return view("admin.CarList.carList_edit");
    }


    public function store(Request $request)
    {
        if ($request->hasFile('logo')){
            $path =$request->file('logo')->store('logo', 'public');
            $store = Car::create([
                'logo' => $path,
                'car_brand' => $request->car_brand,
                'car_model' => $request->car_model,
                'car_years' => $request->car_years,
                'car_Engine_capacity' => $request->car_Engine_capacity,
            ]);
            if ($store){
                return redirect()->route('carList.index')->with('success', 'carList created successfully');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
        }else{
            $store = Car::create([
                'car_brand' => $request->car_brand,
                'car_model' => $request->car_model,
                'car_years' => $request->car_years,
                'car_Engine_capacity' => $request->car_Engine_capacity,
            ]);
            if ($store){
                return redirect()->route('carList.index')->with('success', 'Car_Blank created successfully');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
        }
    }


    public function show(Car $carList)
    {
        return view('admin.CarList.one_cars',['carList'=> $carList]);

    }


    public function edit(Car $carList)
    {
        return view('admin.CarList.carList_edit',['carList'=> $carList]);

    }


    public function update(Request $request, $id)
    {
        $cars = Car::query()->findOrFail($id);
        $cars->car_brand = $request->input('logo');
        $cars->car_brand = $request->input('car_brand');
        $cars->car_model = $request->input('car_model');
        $cars->car_years = $request->input('car_years');
        $cars->car_Engine_capacity = $request->input('car_Engine_capacity');

        if ($request->hasfile('logo')) {
            if ($logo = $cars->logo){
                Storage::disk('public')->delete($logo);
            }
            $file = $request->file('logo');
            $extension = $request->logo->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $file->move(public_path().'/storage/',$fileName);
            $data = $fileName;
            $cars->logo = $data;
        }
        if ($cars->save()) {
            return redirect()->route('carList.index')->with('success', 'Row successfully created');
        }else{
            return redirect()->route(back())->with('fail', 'fail');
        }
    }


    public function destroy($id)
    {
        $delete =  Car::query()->findOrFail($id);
        try{
            $file_name = $delete->logo;
            $file_path = public_path('storage/'.$file_name);
            unlink($file_path);
        }catch (\Throwable $e){

        }
        $delete->delete();
        if($delete->delete()) {
            return redirect()->route('carList.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('carList.index')->with('fail','Deleted fail');
        }
    }
}
