@extends('layouts.default')
@section('title')
    CompanyPanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('carList.index')}}">Back</a>
                <div>Logotype Company`<img  style="width: 50px;height: 50px;border-radius: 50%" src="@if(isset($carList -> logo)){{asset('storage/' . $carList -> logo)}} @else {{asset('images/defolt.jpg')}} @endif"></div>
                <h2>Car Brand`{{ $carList -> car_brand }}</h2>
                <p>Car Model`  {{ $carList -> car_model }}</p>
                <p>Car Years`  {{ $carList -> car_years }}</p>
                <p>Car Engine capacity`  {{ $carList -> car_Engine_capacity }}</p>
                <p>Published`{{ $carList -> created_at }}</p>
                <form class="d-inline" action="{{ route('carList.edit', $carList) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
@endsection