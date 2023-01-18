<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCarUpdateRequest;
use App\Http\Requests\AdminRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function index()
    {
        $carList = Brand::when('brand')->simplePaginate(5);
        return view("admin.dashboard",compact('carList'));

    }


    public function create()
    {
        return view("admin.CarList.carList_edit");
    }


    public function store(AdminRequest $request)
    {
            $path =$request->file('logo')->store('logo', 'public');
            $store = Brand::create([
                'logo' => $path,
                'car_brand' => $request->car_brand,
                'car_model' => $request->car_model,
            ]);
            if ($store){
                return redirect()->route('carList.index')->with('success', 'carList created successfully');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
    }


    public function show(Brand $carList)
    {
        return view('admin.CarList.one_cars',['carList'=> $carList]);

    }


    public function edit(Brand $carList)
    {
        return view('admin.CarList.carList_edit',['carList'=> $carList]);

    }


    public function update(AdminRequest $request, $id)
    {
        $cars = Brand::query()->findOrFail($id);
        $cars->car_brand = $request->input('logo');
        $cars->car_brand = $request->input('car_brand');
        $cars->car_model = $request->input('car_model');

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
        $delete =  Brand::query()->findOrFail($id);
        try{
            $file_name = $delete->logo;
            Storage::disk('public')->delete($file_name);
        }catch (\Throwable $e){

        }

        if($delete->delete()) {
            return redirect()->route('carList.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('carList.index')->with('fail','Deleted fail');
        }
    }
}
