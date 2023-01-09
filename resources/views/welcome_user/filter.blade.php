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
    {{--    /////////////////////////////////--}}
    <link href="{{asset('Auto%20Cars/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script src="{{asset('Auto%20Cars/js/bootstrap.js')}}"></script>
    <!-- Custom Theme files -->
    <link href="{{asset('Auto%20Cars/css/style.css')}}" rel='stylesheet' type='text/css' />

    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="{{asset('Auto%20Cars/js/jquery.min.js')}}"></script>
    <script src="{{asset('Auto%20Cars/js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
@endsection
@section('content')
    <div class="banner banner2" style="background-position-y: center;">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <h1><a href="#"><img src="{{asset('Auto%20Cars/images/car.png')}}" alt=""/>AUTO <span>CARS</span></a></h1>
                </div>
                <div class="top_details">
                    <p><span></span> (880)123 2500</p>
                    <div class="search">
                        <form>
                            <input id="myInput" type="text" value="" placeholder="Search...">
                            <input style="cursor: auto" type="submit" value="">
                        </form>
                    </div>
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
                                <form action="{{ route("register") }}" method="post" id="Register">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label" >User name</label>
                                        <input  name="name" type="text" class="form-control" id="name" placeholder="John Smith">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">User email</label>
                                        <input  name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
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
                <div class="clearfix"></div>
            </div>
            <nav class="navbar navbar-default">
                <div style="width: 100%;height: 40px;">
                    <a style="text-decoration: none;color: black;width: 100%;height:40px;display: flex;align-items: center;justify-content: center;" href="{{route('welcome')}}">Back</a>
                </div>
            </nav>
        </div>
    </div>
    <div class="about">
        <div class="container">
            <div class="abt-btm-grids">
                <div class="d-flex align-items-center justify-content-end">
                </div>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
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
                    <div class="container" style="display: flex;justify-content: space-between">
                        <div style="    padding-right: 20px;margin-right: 10px;">
                            <form id="brandsForm">
                                @foreach($cars as $row)
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="car_brands" value="{{$row->car_brand}}">
                                        <label class="form-check-label" for="car_brands">
                                            {{$row->car_brand}}
                                        </label>
                                    </div>
                                    <button type="submit">Search</button>
                                @endforeach
                            </form>
                        </div>
                        <div style="width: 1000px" id="products" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
                            <div class="item col-xs-4 col-lg-4 list-group-item">
                                @if(isset($cars))
                                    @foreach($cars as $row)
                                        <div class="thumbnail" id="myTable">
                                            <img class="group list-group-image" src="{{asset('storage/' . $row->logo[1])}}" alt="1" />
                                            <div class="caption">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <h4 id="brand_name" class="group inner list-group-item-heading">{{$row->car_brand }}</h4>
                                                        <p class="group inner list-group-item-text">
                                                            {{$row->car_model}}
                                                        </p>
                                                        <p id="price" class="lead">{{$row->many}}$</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <a class="btn btn-success" href="{{route('show',$row)}}">Show</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <table><tr><td><span>{{$cars->links()}}</span></td></tr></table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#myInput").on("keyup", function () {
                            let value = $(this).val().toLowerCase();
                            $("#myTable ").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        });
                </script>
            </div>
        </div>
    </div>
    <div class="footer2">
        <div class="container">
            <div class="ftr2-grids">
                <div class="col-md-4 ftr2-grid1">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="{{route("welcome")}}">Home</a></li>
                    </ul>
                </div>
                <div class="col-md-4 ftr2-grid2">
                    <h3>Latest Tweets</h3>
                    <div class="ftr2-grid">
                        <p>It is a long established fact that a
                            reader will be distracted by the of a reader page when at its layout.</p>
                        <a href="#">1 Hour ago</a>
                    </div>
                    <div class="ftr2-grid">
                        <p>It is a long established fact that a
                            reader will be distracted by the of a reader page when at its layout.</p>
                        <a href="#">3 Hour ago</a>
                    </div>
                </div>
                <div class="col-md-4 ftr6-grid3">
                    <h3>Get in Touch</h3>
                    <p>It is a long established fact that a reader will be distracted by the r-
                        eadable content of a page when looking at its layout.</p>
                    <form>
                        <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
                        <input type="submit" value="Subscribe"/>
                    </form>
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="facebook"></i></a></li>
                            <li><a href="#"><i class="twitter"></i></a></li>
                            <li><a href="#"><i class="dribble"></i></a></li>
                            <li><a href="#"><i class="google"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-8 ftr2-bottom" style="width: 100%;">
            <p>Copyright &copy; 2015 <span>Auto Cars</span> All rights reserved | Design by <a href="#">W3layouts</a></p>
        </div>
    </div>
@endsection