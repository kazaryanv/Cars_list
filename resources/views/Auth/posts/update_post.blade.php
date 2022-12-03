@extends('layouts.default')
@section('title')
    @if(isset($posts))
        Edit Car
    @else
        New Car
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
        @if(isset($posts))
            Update Car List
        @else
            <h2>Create new Car List</h2>
        @endif
        <form action="{{ (isset($posts)) ? route('posts.update', $posts)  : route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($posts))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo post</label>
                @if(isset($posts))
                    <img style="width: 50px;height: 50px;border-radius: 50%;margin-bottom: 5px" src="@if(isset($posts -> logo)){{asset('storage/' . $posts -> logo)}} @else {{asset('images/defolt.jpg')}} @endif" alt="">
                @endif
                <input value="{{(isset($posts)) ? $posts->logo : ''  }}" name="logo[]" type="file" class="form-control" id="logo[]" multiple placeholder="logo">
            </div>
            <select class="form-control" id="car_brand"  name="car_brand">
                <option>Please select a company</option>
                @foreach(\App\Models\Car::all() as $carList)
                    <option @if((isset($posts)) ? $posts->id : old('car_brand', '')) selected @endif value="{{$carList->car_brand}}">{{$carList->car_brand}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_model"  name="car_model">
                <option>Please select a company</option>
                @foreach(\App\Models\Car::all() as $carList)
                    <option @if((isset($posts)) ? $posts->id : old('car_model', '')) selected @endif value="{{$carList->car_model}}">{{$carList->car_model}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_years"  name="car_years">
                <option>Please select a company</option>
                @foreach(\App\Models\Car::all() as $carList)
                    <option @if((isset($posts)) ? $posts->id : old('car_years', '')) selected @endif value="{{$carList->car_years}}">{{$carList->car_years}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_Engine_capacity"  name="car_Engine_capacity">
                <option>Please select a company</option>
                @foreach(\App\Models\Car::all() as $carList)
                    <option @if((isset($posts)) ? $posts->id : old('car_Engine_capacity', '')) selected @endif value="{{$carList->car_Engine_capacity}}">{{$carList->car_Engine_capacity}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_Transmission"  name="car_Transmission">
                <option>Please select a company</option>
                @foreach(\App\Models\Car::all() as $carList)
                    <option @if((isset($posts)) ? $posts->id : old('car_Transmission', '')) selected @endif value="{{$carList->car_Transmission}}">@if(isset($carList->car_Transmission)){{$carList->car_Transmission}}@endif</option>
                @endforeach
            </select>
            <br>

            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <input value="{{(isset($posts)) ? $posts->content : '' }}" type="text" name="content"  class="form-control" id="content" placeholder="content">
            </div>
            @if(isset($posts))
                <button class="btn btn-primary">
                    Update
                </button>
                <a href="{{ route('posts.show', $posts->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('posts.index') }}">Back</a>
            @endif

        </form>
    </div>
@endsection