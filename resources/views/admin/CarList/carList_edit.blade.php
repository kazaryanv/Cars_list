@extends('layouts.default')
@section('title')
    @if(isset($carList))
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
        @if(isset($carList))
         Update Car List
        @else
            <h2>Create new Car List</h2>
        @endif
        <form action="{{ (isset($carList)) ? route('carList.update', $carList)  : route('carList.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($carList))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo  carList</label>
                @if(isset($carList))
                    <img style="width: 50px;height: 50px;border-radius: 50%;margin-bottom: 5px" src="@if(isset($carList -> logo)){{asset('storage/' . $carList -> logo)}} @else {{asset('images/defolt.jpg')}} @endif" alt="">
                @endif
                <input value="{{(isset($carList)) ? $carList->logo : ''  }}" name="logo" type="file" class="form-control" id="logo" placeholder="logo">
            </div>

            <div class="mb-3">
                <label for="car_brand" class="form-label"> brand</label>
                <input  value="{{(isset($carList)) ? $carList->car_brand : '' }}" type="text" name="car_brand"  class="form-control" id="car_brand" placeholder="brand">
            </div>

            <div class="mb-3">
                <label for="car_model" class="form-label">car_model</label>
                <input  value="{{(isset($carList)) ? $carList->car_model : '' }}" type="text" name="car_model"  class="form-control" id="car_model" placeholder="car_model">
            </div>
            @if(isset($carList))
                <button class="btn btn-primary">
                    Update
                </button>
                <a href="{{ route('carList.show', $carList->id) }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a href="{{ route('carList.index') }}">Back</a>
            @endif

        </form>
    </div>
@endsection