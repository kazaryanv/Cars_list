@extends('layouts.default')
@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2>Sign up</h2>
                <form action="{{ route("register") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">User name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="John Smith">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">User email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">User password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="1234">
                    </div>
                    <button class="btn btn-primary" onmouseover="visitPage()">Register</button>
                    <a href="{{route('welcome')}}">Back</a>

                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div>

    </div>
        @if($errors->any())
            <div class="text-danger" id="box">
                <ul id="totalpricecheck" style="width: 100%;height: auto;display: flex;align-items: center;justify-content: space-around;margin-top: 70px;">
                    @foreach($errors->all() as $error)
                        <li id="error" class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <script>
        function visitPage() {
             $('#box').show();
            setTimeout(function() {
                $('#box').fadeOut('fast');
            }, 2000);
        }
    </script>
@endsection
