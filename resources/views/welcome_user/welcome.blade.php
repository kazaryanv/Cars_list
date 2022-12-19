@extends('layouts.default')
@section('title')
    Auto Cars | Home
@endsection
@section('metaScript')
    <title></title>
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
    <script src="{{asset('Auto%20Cars/js/responsiveslides.min.js')}}"></script>

    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider3,#slider2").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
@endsection
@section('content')
    <div class="banner">
        <div class="container">
            <div class="header" style="margin: unset;padding-top: 4em">
                <div class="logo">
                    <h1><a href="#"><img src="{{asset('Auto%20Cars/images/car.png')}}" alt=""/>AUTO <span>CARS</span></a></h1>
                </div>
                <div class="top_details">
                    <p><span></span> (880)123 2500</p>
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
                </div>
                <div class="clearfix"></div>
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
                        <li><a href="{{route('cars')}}">search Cars</a></li>
                        <li><a href="#service">Services</a></li>
                        <li><a href="#slide">Slide</a></li>
                        <li><a href="#contact">Contact Us</a></li>
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
    <!---->
    <div class="welcome" id="welcomes">
        <div class="container">
            <div class="welcome_sec">
                <div class="col-md-6 welcome_info">
                    <h3>Welcome</h3>
                    <span></span>
                    <h4>Ut eget neque ac ipsum venenatis lobortis at et diam.</h4>
                    <p>Curabitur porta nisl non dui lobortis, vel aliquet ex pretium. Vivamus ullamcorper odio at commodo egestas.
                        Mauris lacinia nibh a enim dictum, sit amet scelerisque enim molestie. Morbi ac laoreet ante, quis fermentum urna.
                        Etiam sit amet massa non nunc tincidunt mattis. Nunc non ex ultricies, tristique leo sed, vehicula mauris. Sed mollis tristique ligula, nec euismod dolor pharetra non.</p>
                    <p>Etiam ante diam, congue sit amet elit placerat, faucibus faucibus ipsum. Vivamus vel laoreet nulla. Aenean id bibendum diam. Donec rutrum mi diam, sed tempus metus luctus a.
                        Nullam vitae quam sed felis mattis facilisis. Nunc magna. Donec eleifend odio non neque semper eleifend. Mauris pharetra venenatis augue.</p>
{{--                    <a href="about.html" class="hvr-bounce-to-bottom">Read More</a>--}}
                </div>
                <div class="col-md-6 welcome_pic">
                    <h2>Suspendisse massa pellentesque</h2>
                    <img src="{{asset('Auto%20Cars/images/wc.jpg')}}" class="img-responsive" alt=""/>
                    <h3>Vestibulum efficitur lacus nulla porttitor lorem luctus.</h3>
                    <p>Duis vitae auctor purus. Aenean feugiat nunc mauris, id porttitor turpis
                        rhoncus sit amet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus felis ac
                        risus lacinia, non venenatis erat vestibulum.</p>
                    <p></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!---->
    <div class="auto_sec" id="service">
        <div class="container">
            <h3>Complete auto service</h3>
            <span></span>
            <div class="auto_sec_grids">
                <div class="col-md-8 auto_sec_left">
                    <img src="{{asset('Auto%20Cars/images/pic2.jpg')}}" class="img-responsive" alt=""/>
                    <h5><a href="#">Mauris a eros quis purus suscipit iaculis</a></h5>
                    <p>Etiam ante diam, congue sit amet elit placerat, faucibus faucibus ipsum. Vivamus vel laoreet nulla. Aenean id bibendum diam. Donec rutrum mi diam, sed tempus metus luctus a.
                        Nullam vitae quam sed felis mattis facilisis. Nunc magna ex, consequat et dapibus nec, volutpat sit amet enim. Ut a sagittis nulla. Duis pulvinar et dolor vitae vulputate.
                        Donec eleifend odio non neque semper eleifend. Mauris pharetra venenatis augue.</p>
                </div>
                <div class="col-md-4 auto_sec_right">
{{--                    <p><a href="gallery.html">Donec maximus enim</a></p>--}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!---->
    <script>
        $(function () {
            $("#slider2").responsiveSlides({
                auto: true,
                speed: 500,
                namespace: "callbacks2",
                pager: true,
            });
        });
    </script>

    <div class="slider btm_sld" id="slide">
        <div class="container">
            <div class="callbacks2_container">
                <ul class="rslides" id="slider2">
                    <li>
                        <p>Curabitur pharetra sed magna at tincidunt. Maecenas auctor tincidunt ex.
                            Aliquam a vestibulum Donec diam ipsum euismod.</p>
                    </li>
                    <li>
                        <p>Fusce erat nibh, ornare et suscipit non, varius a sapien. Donec vel lectus
                            vitae nibh sodales semper. Donec diam ipsum.</p>
                    </li>
                    <li>
                        <p>Proin tincidunt sit amet velit quis dignissim. Donec et odio sed purus tristique
                            vitae nibh imperdiet diam sed eget metus.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!---->

    <!---->
    <div class="feature_sec" id="feature">
        <div class="container">
            <div class="feature_head">
                <h3>Featured News</h3>
                <span></span>
            </div>
            <ul id="flexiselDemo3">
                <li>
                    <div class="biseller-column">
                        <a href="#"><img src="{{asset('Auto%20Cars/images/pic6.jpg')}}" alt=""/></a>
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
{{--                        <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>--}}
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <a href="#"><img src="{{asset('Auto%20Cars/images/pic5.jpg')}}" alt=""/></a>
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra.</p>
{{--                        <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>--}}
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <a href="#"><img src="{{asset('Auto%20Cars/images/pic8.jpg')}}" alt=""/></a>
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra.</p>
{{--                        <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>--}}
                    </div>
                </li>
                <li>
                    <div class="biseller-column">
                        <a href="#"><img src="{{asset('Auto%20Cars/images/pic4.jpg')}}" alt=""/></a>
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit	egestas nec felis. Nunc pharetra.</p>
{{--                        <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>--}}
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo3").flexisel({
                        visibleItems:4,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint:480,
                                visibleItems:2
                            },
                            landscape: {
                                changePoint:640,
                                visibleItems:2
                            },
                            tablet: {
                                changePoint:768,
                                visibleItems:3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="{{asset('Auto%20Cars/js/jquery.flexisel.js')}}"></script>
        </div>
    </div>
    <!---->
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
                    <a href="#" style="height:30px;font-size: 70px;text-decoration: none;color: white;display: flex;align-items: center;justify-content: flex-end;position: absolute;left: 475px;bottom: -35px;">^</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-8 ftr2-bottom">
            <p>Copyright &copy; 2015 <span>Auto Cars</span> All rights reserved | Design by <a href="#">W3layouts</a></p>
        </div>
    </div>
@endsection
