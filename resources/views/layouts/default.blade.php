<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
@yield('metaScript')
<body class="antialiased" id="page-top">
    <div class="banner">
        <div class="container">
            <div class="header" style="margin: unset;padding-top: 4em">
                <div class="logo">
                    <h1><a href="{{route('welcome')}}"><img src="{{asset('Auto%20Cars/images/car.png')}}" alt=""/>AUTO<span>CARS</span></a></h1>
                </div>
                <div class="top_details">
                    <p><span></span>(880)123 2500</p>
                    @auth
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Register">
                                Logout
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">hastat uzum eq helnel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route("logout") }}" method="get">
                                            @csrf

                                            <button style="width: 100%;margin-bottom: 5px" class="btn btn-primary">Yes</button>
                                            <button style="width: 100%;" type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Login" style="margin-left: 10px">
                                <a style="text-decoration: none;color: white;" href="{{route('carList.index')}}">My Posts</a>
                            </button>
                            @else
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Login" style="margin-left: 10px">
                                    <a style="text-decoration: none;color: white;" href="{{route('cars.index')}}">My Posts</a>
                                </button>
                            @endif
                        </div>
                    @endauth
                        @guest
                        <div class="d-flex align-items-center justify-content-end">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Register">
                                Log in
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

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Login" style="margin-left: 10px">
                                Register
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
                    @endguest
                </div>
            </div>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
                </div>
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="display: flex;flex-direction: unset;margin: unset">
                        <li class="active"><a href="{{route('welcome')}}">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="{{route('cars')}}">Cars</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="banner-info">
                            <h3>Aliquam ut mauris vestibulum, condimentum neque vitae nulla.</h3>
                            <p>Pellentesque congue libero accumsan porta.</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h3>Nam et urna interdum blandit condimentum vivamus neque vitae.</h3>
                            <p>Sed eu quam ut orci ullamcorper tincidunt quam.</p>
                        </div>
                    </li>
                    <li>
                        <div class="banner-info">
                            <h3>Cras pretium metus sed justo condimentum, sed commodo nulla.</h3>
                            <p>Nulla eu sapien et eros finibus congue.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@yield('content')


    <div class="footer2" id="contact">
        <div class="container">
            <div class="ftr2-grids">
                <div class="col-md-4 ftr2-grid1">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="{{route('cars')}}">search Cars</a></li>
                        <li><a href="#service">Services</a></li>
                        <li><a href="#slide">Slide</a></li>
                        <li><a href="#contact">Contact Us</a></li>
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
                        <input id="contents" type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
                        <input id="thenks" type="submit" value="Subscribe"/>
                    </form>
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="facebook"></i></a></li>
                            <li><a href="#"><i class="twitter"></i></a></li>
                            <li><a href="#"><i class="dribble"></i></a></li>
                            <li><a href="#"><i class="google"></i></a></li>
                        </ul>
                    </div>
                    <a href="#" style="height:30px;font-size: 70px;text-decoration: none;color: white;display: flex;align-items: center;justify-content: flex-end;position: absolute;left: 475px;bottom: -35px;">^</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-8 ftr2-bottom">
            <p>Copyright &copy; 2015 <span>Auto Cars</span> All rights reserved | Design by <a href="#">W3layouts</a></p>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#thenks").click(function () {
                let content = $("#contents").val();
                alert( content + ' ' +'dis your Email');
                alert('Thank you my freands');
            });
        });
    </script>
</body>
</html>
