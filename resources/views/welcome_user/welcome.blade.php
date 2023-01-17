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
    <div class="feature_sec" id="feature">
        <div class="container mb-5 pb-5 mt-5 pt-5">
            <div class="feature_head">
                <h3>Slider Cars</h3>
                <span></span>
            </div>
            <ul id="flexiselDemo3">
                @foreach(\App\Models\Car::all() as $car)
                    <li>
                        <div class="biseller-column">
                            <a href="{{route('show',$car)}}"><img src="{{asset('storage/' . $car->logo[0])}}" alt="1"/></a>
                            <h4>{{$car->car_brand}}</h4>
                            <p>{{$car->car_model}}</p>
                            <p>{{$car->content}}</p>
                            <a class="more hvr-bounce-to-bottom" href="{{route('show',$car)}}">Read More..</a>
                        </div>
                    </li>
                @endforeach
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
@endsection
