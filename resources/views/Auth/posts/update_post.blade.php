@extends('layouts.default')
@section('title')
    @if(isset($car))
        Edit Cars
    @else
        New Cars
    @endif
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        @if(isset($cars))
            Update Cars List
        @else
            <h2>Create new Cars List</h2>
        @endif
        <form action="{{ (isset($cars)) ? route('cars.update', $cars)  : route('cars.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($cars))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo post</label>
                @if(isset($cars))
                    <img class="col" style="width: 50px;height: 50px; border-radius: 50%;margin-bottom: 20px;" src="{{asset('storage/' . $cars->logo[0] )}}">
                @endif
                <input value="{{(isset($cars)) ? : ''  }}" name="logo[]" type="file" class="form-control" id="logo" multiple placeholder="logo">
            </div>
            <select class="form-control" id="car_brand"  name="car_brand">
                <option value="">Please select a car brand</option>
                @foreach(\App\Models\Brand::all() as $carList)
                    <option @if((isset($cars)) ? $cars->car_brand :  '') selected @endif value="{{$carList->car_brand}}">{{$carList->car_brand}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_model"  name="car_model">
                <option value="">Please select a car model</option>
                @foreach(\App\Models\Brand::all() as $carList)
                    <option @if((isset($cars)) ? $cars->car_model  :  '') selected @endif value="{{$carList->car_model}}">{{$carList->car_model}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_years"  name="car_years">
                <option>Please select a car years</option>
                @for($i=1971;$i<date('Y');$i++)
                    <option @if((isset($cars)) ? $cars->car_years : '' ) selected @endif value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <br>
            <select class="form-control" id="car_Engine_capacity"  name="car_Engine_capacity">
                <option>Please select a car engine capacity(kamel matori litr@)</option>
                @for($i=0.5;$i<=7;$i++)
                    <option @if((isset($cars)) ? $cars->car_Engine_capacity :  '') selected @endif value="{{$i}}">{{$i}}L</option>
                @endfor
            </select>
            <br>
            <select class="form-control" id="car_Transmission"  name="car_Transmission">
                <option>Please select a car transmission</option>
                @foreach(['Aftomat','Mexanika'] as $carList)
                    <option @if((isset($cars)) ? $cars->car_Transmission : '') selected @endif value="{{$carList}}">{{$carList}}</option>
                @endforeach
            </select>
            <br>
            <div class="mb-3">
                <label for="many" class="form-label">many</label>
                <input value="{{(isset($cars)) ? $cars->many : '' }}" type="text" name="many"  class="form-control" id="many" placeholder="many">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input value="{{(isset($cars)) ? $cars->content : '' }}" type="text" name="content"  class="form-control" id="content" placeholder="content">
            </div>
            @if(isset($car))
                <button class="btn btn-primary">
                    Update
                </button>
                <a href="{{ route('cars.show', $cars->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('cars.index') }}">Back</a>
            @endif

        </form>
    </div>
@endsection