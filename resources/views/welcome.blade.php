@extends('layouts.default')
@section('title')
    Welcome
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-end">
        <a href="{{ route('register-view') }}" class="btn btn-light" style="margin: 15px 20px 0px 20px;">Register</a>
        <a href="{{ route('login-view') }}" class="btn btn-light" style="margin: 15px 20px 0px 20px;">Log in</a>
    </div>
@endsection
