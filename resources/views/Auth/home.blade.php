@extends('layouts.default')
@section('title')
    Home
@endsection
@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container d-flex align-items-center justify-content-between">
            <a href="{{route('cars.create')}}">Create New Post</a>
            <a href="{{ route('logout') }}" class="btn btn-light" style="margin: 15px 20px 0px 20px;">Sign out</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">car_brand</th>
            <th scope="col">car_model</th>
            <th scope="col">logo</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($posts))
            @foreach($posts as $row)
                <tr>
                    <th scope="row">{{ $row -> id}}</th>
                    <td>{{ $row -> car_brand }}</td>
                    <td>{{$row->car_model}}</td>
                        <td>
                            <img class="col" style="width: 50px;height: 50px; border-radius: 50%" src="{{asset('storage/' . $row->logo[0] )}}">
                        </td>
                        <td>
                            <a class="btn btn-outline-success" href="{{route('cars.show' , $row->id)}}">Edit</a>
                            <form class="d-inline" action="{{ route('cars.destroy', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
@endsection






