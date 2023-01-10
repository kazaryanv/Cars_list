@extends('layouts.admin_lay')
@section('title')
    AdminPanel
@endsection
@section('a_teg')
    {{route('carList.index')}}
@endsection
@section('logo')
    {{route('carList.index')}}
@endsection
@section('my_poisk')
    Hello
@endsection
@section('search')
    <input id="myInput" type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
    <div class="input-group-append">
            <button style="border-radius: 0px 10px 10px 0px" class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
            </button>
    </div>
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function () {
                let value = $(this).val().toLowerCase();
                $("#myTable div").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
@section('content')
        <div class="container-fluid">
            <div class="container d-flex align-items-center justify-content-between">
                <a style="margin: 10px;" href="{{route('carList.create')}}">Create New Post</a>
            </div>
        </div>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="myTable">
            @if(isset($carList))
                @foreach($carList as $row)
                    @if(isset($row->car_brand,$row->logo))
                        <div class="card-body" style="-webkit-box-shadow:0px 0px 100px 0px #0078ff inset;-moz-box-shadow:0px 0px 100px 0px #0078ff inset;box-shadow:0px 0px 100px 0px #0078ff inset;margin-bottom: 20px;border-radius: 15px">
                            <div>
                                <img style="font-family:'Noto Sans Armenian','Open Sans','lucida grande',tahoma,arial,sans-serif;font-size: 12px;line-height: 1.5;-webkit-font-smoothing: antialiased;color: #222;text-align: left;border: 0;vertical-align: middle;margin-top: 0;width: 174px;height: 165px;border-radius: 8px;transition: all 0.2s;object-fit: cover;visibility: visible;" src="{{asset('storage/' . $row->logo)}}">
                                <h2>{{$row->car_brand}}</h2>
                                <p>{{$row->car_model}}</p>
                                <a class="btn btn-outline-success" href="{{route('carList.show' , $row->id)}}">Edit</a>
                                <form class="d-inline" action="{{ route('carList.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
                    <table><tr><td><span>{{$carList->links()}}</span></td></tr></table>
            @endif
        </div>
    </div>
@endsection