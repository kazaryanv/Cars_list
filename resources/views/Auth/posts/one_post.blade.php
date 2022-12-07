@extends('layouts.default')
@section('title')
    Cars
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('cars.index')}}">Back</a>
                    <div>Image CAR`
                       @foreach($car->logo as $image) <img class="col" style="width: 50px;height: 50px; border-radius: 50%" src="{{asset('storage/' . $image )}}">@endforeach
                    </div>
                <h2>Car Brand`{{ $car->car_brand }}</h2>
                <p>Car Model`  {{ $car->car_model }}</p>
                <p>Car Years`  {{ $car->car_years }}</p>
                <p>Car Engine capacity`  {{ $car->car_Engine_capacity }}</p>
                <p>Published`{{ $car->created_at }}</p>
                <form class="d-inline" action="{{ route('cars.edit', $car) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
@endsection