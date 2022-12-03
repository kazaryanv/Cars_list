@extends('layouts.default')
@section('title')
    CompanyPanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{route('posts.index')}}">Back</a>
                    <div>Image CAR`
                        <img  style="width: 50px;height: 50px;border-radius: 50%" src="{{asset('storage/' . $post->logo)}}">
                    </div>
                <h2>Car Brand`{{ $post->car_brand }}</h2>
                <p>Car Model`  {{ $post->car_model }}</p>
                <p>Car Years`  {{ $post->car_years }}</p>
                <p>Car Engine capacity`  {{ $post -> car_Engine_capacity }}</p>
                <p>Published`{{ $post->created_at }}</p>
                <form class="d-inline" action="{{ route('posts.edit', $post) }}" method="get">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Edit</button>
                </form>

            </div>
        </div>
    </div>
@endsection