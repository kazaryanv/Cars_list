@extends('layouts.default')
@section('title')
    Login
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Sign in</h2>
                <form action="{{ route("login") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">User email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">User password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="1234">
                    </div>
                    @if($errors->any())
                        <div class="text-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button class="btn btn-primary">login</button>
                    <a href="{{route('welcome')}}">Back</a>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
