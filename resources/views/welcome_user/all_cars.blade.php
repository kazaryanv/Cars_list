@extends('layouts.default')
@section('title')
    Home
@endsection
@section('metaScript')
    <title></title>
    <link href="{{asset('Auto%20Cars/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script src="{{asset('Auto%20Cars/js/bootstrap.js')}}"></script>
    <link href="{{asset('Auto%20Cars/css/style.css')}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="{{asset('Auto%20Cars/js/jquery.min.js')}}"></script>
    <script src="{{asset('Auto%20Cars/js/responsiveslides.min.js')}}"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
    <div class="d-flex align-items-center justify-content-end">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Login" style="margin-top: 20px">
            Log in
        </button>
    <!-- Modal -->
        <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route("login") }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label style="display: flex;align-items: center;justify-content: center;" for="email" class="form-label">User email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
                        </div>

                        <div class="mb-3">
                            <label style="display: flex;align-items: center;justify-content: center;" for="password" class="form-label">User password</label>
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
                        <button style="width: 100%;margin-bottom: 5px" class="btn btn-primary">login</button>
                        <button style="width: 100%;" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Register" style="margin-left: 10px;margin-right: 10px;margin-top: 20px">
            Register
        </button>
        <!-- Modal -->
        <div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                        <button style="width: 100%;" class="btn btn-primary" onmouseover="visitPage()">Register</button>
                        <button style="width: 100%;" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<div style="display:flex;align-items: center;justify-content: flex-end;margin-right: 20px">
    <a style="text-decoration: none; color: black;margin-top: 20px" href="{{route('welcome')}}">Back</a>
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>

    <style>
        .glyphicon { margin-right:5px; }
        .thumbnail {
            margin-bottom: 20px;
            padding: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px
        }

        .item.list-group-item {
            float: none;
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px
        }
        .item.list-group-item:nth-of-type(odd):hover,.item.list-group-item:hover {
            background: silver;
        }
        .item.list-group-item .list-group-image {
            margin-right: 10px
        }
        .item.list-group-item .thumbnail {
            margin-bottom: 10px
        }
        .item.list-group-item .caption {
            padding: 9px 9px 0px 9px
        }
        .item.list-group-item:nth-of-type(odd) {
            background: #eeeeee
        }
        .item.list-group-item:before, .item.list-group-item:after {
            display: table;
            content: " "
        }
        .item.list-group-item img {
            float: left;
            width: 110px;
        }
        .item.list-group-item:after {
            clear: both
        }
        .list-group-item-text {
            margin: 0 0 11px
        }
        /*///////////////////////*/
    </style>
    <div class="container">
        <div class="well well-sm">
            <strong>Вид: </strong>
            <div class="btn-group">
                <a href="#" id="list" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th-list"></span>Список</a>
                <a href="#" id="grid" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-th"></span>Сетка</a>
            </div>
        </div>
            <h2>Filterable Table</h2>
            <input class="form-control" id="myInput" type="text" placeholder="Search..">
            <br>


        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="exampleCheck1" value="BMW">
            <label class="form-check-label" for="exampleCheck1">Default BMW</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="exampleCheck2" @if() value="Jaguar" @endif>
            <label class="form-check-label" id="exampleCheck2">Checked Jaguar</label>
        </div>

        <div id="products" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
            <div class="item col-xs-4 col-lg-4">
                @if(isset($guest))
                    @foreach($guest as $row)
                <div class="thumbnail" id="myTable">
                    <img class="group list-group-image" src="{{asset('storage/' . $row->logo[1])}}" alt="1" />
                    <div class="caption">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h4 id="brand_name" class="group inner list-group-item-heading">{{$row->car_brand }}</h4>
                                <p class="group inner list-group-item-text">
                                    {{$row->car_model}}
                                </p>
                                <p class="lead">{{$row->many}}$</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="{{route('show',$row)}}">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#myTable ").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).ready(function(){
            $('#exampleCheck1').on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#myTable ").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).ready(function(){
            $("#exampleCheck2").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#myTable ").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    if($("#exampleCheck2").value['0']){
                        alert('ok')
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#grid').click(function(event){event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');});});
            $('#list').click(function(event){event.preventDefault();
                $('#products .item').addClass('list-group-item');});
    </script>
@endsection