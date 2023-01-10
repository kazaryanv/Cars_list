@extends('layouts.default')
@section('title')
    Home
@endsection
@section('metaScript')
    <link href="{{asset('Auto%20Cars/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary JavaScript plugins) -->
    <script src="{{asset('Auto%20Cars/js/bootstrap.js')}}"></script>
    <link href="{{asset('Auto%20Cars/css/style.css')}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="{{asset('Auto%20Cars/js/jquery.min.js')}}"></script>
    <script src="{{asset('Auto%20Cars/js/responsiveslides.min.js')}}"></script>
    <link href="{{asset('Auto%20Cars/css/style.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="{{asset('Auto%20Cars/js/jquery.min.js')}}"></script>
    <script src="{{asset('Auto%20Cars/js/responsiveslides.min.js')}}"></script>
    <script>
        var WRAPPER_SELECTOR=".slider__wrapper",
            ITEMS_SELECTOR=".slider__items",
            ITEM_SELECTOR=".slider__item",
            ITEM_CLASS_ACTIVE="slider__item_active",
            CONTROL_SELECTOR=".slider__control",
            CONTROL_CLASS_SHOW="slider__control_show",
            INDICATOR_WRAPPER_ELEMENT="ol",
            INDICATOR_WRAPPER_CLASS="slider__indicators",
            INDICATOR_ITEM_ELEMENT="li",
            INDICATOR_ITEM_CLASS="slider__indicator",
            INDICATOR_ITEM_CLASS_ACTIVE="slider__indicator_active",
            SWIPE_THRESHOLD=20,TRANSITION_NONE="transition-none";
        function SimpleAdaptiveSlider(t,i){for(var e in this._$root=document.querySelector(t),this._$wrapper=this._$root.querySelector(WRAPPER_SELECTOR),this._$items=this._$root.querySelector(ITEMS_SELECTOR),this._$itemList=this._$root.querySelectorAll(ITEM_SELECTOR),this._currentIndex=0,this._minOrder=0,this._maxOrder=0,this._$itemWithMinOrder=null,this._$itemWithMaxOrder=null,this._minTranslate=0,this._maxTranslate=0,this._direction="next",this._balancingItemsFlag=!1,this._transform=0,this._hasSwipeState=!1,this._swipeStartPosX=0,this._intervalId=null,this._config={loop:!0,autoplay:!1,interval:5e3,swipe:!0},i)this._config.hasOwnProperty(e)&&(this._config[e]=i[e]);for(var s=0,n=this._$itemList.length;s<n;s++)this._$itemList[s].dataset.order=s,this._$itemList[s].dataset.index=s,this._$itemList[s].dataset.translate=0;if(this._config.loop){var r=this._$itemList.length-1,a=100*-this._$itemList.length;this._$itemList[r].dataset.order=-1,this._$itemList[r].dataset.translate=100*-this._$itemList.length;var o="translateX(".concat(a,"%)");this._$itemList[r].style.transform=o}this._addIndicators(),this._refreshExtremeValues(),this._setActiveClass(),this._addEventListener(),this._autoplay()}SimpleAdaptiveSlider.prototype._setActiveClass=function(){var t,i,e,s;for(t=0,i=this._$itemList.length;t<i;t++)e=this._$itemList[t],s=parseInt(e.dataset.index),this._currentIndex===s?e.classList.add(ITEM_CLASS_ACTIVE):e.classList.remove(ITEM_CLASS_ACTIVE);var n=this._$root.querySelectorAll("."+INDICATOR_ITEM_CLASS);if(n.length)for(t=0,i=n.length;t<i;t++)e=n[t],s=parseInt(e.dataset.slideTo),this._currentIndex===s?e.classList.add(INDICATOR_ITEM_CLASS_ACTIVE):e.classList.remove(INDICATOR_ITEM_CLASS_ACTIVE);var r=this._$root.querySelectorAll(CONTROL_SELECTOR);if(r.length)if(this._config.loop)for(t=0,i=r.length;t<i;t++)r[t].classList.add(CONTROL_CLASS_SHOW);else 0===this._currentIndex?(r[0].classList.remove(CONTROL_CLASS_SHOW),r[1].classList.add(CONTROL_CLASS_SHOW)):this._currentIndex===this._$itemList.length-1?(r[0].classList.add(CONTROL_CLASS_SHOW),r[1].classList.remove(CONTROL_CLASS_SHOW)):(r[0].classList.add(CONTROL_CLASS_SHOW),r[1].classList.add(CONTROL_CLASS_SHOW))},SimpleAdaptiveSlider.prototype._move=function(){if("none"===this._direction)return this._$items.classList.remove(TRANSITION_NONE),void(this._$items.style.transform="translateX(".concat(this._transform,"%)"));if(!this._config.loop){if(this._currentIndex+1>=this._$itemList.length&&"next"===this._direction)return void this._autoplay("stop");if(this._currentIndex<=0&&"prev"===this._direction)return}var t="next"===this._direction?-100:100,i=this._transform+t;"next"===this._direction?++this._currentIndex>this._$itemList.length-1&&(this._currentIndex-=this._$itemList.length):--this._currentIndex<0&&(this._currentIndex+=this._$itemList.length),this._transform=i,this._$items.style.transform="translateX(".concat(i,"%)"),this._setActiveClass()},SimpleAdaptiveSlider.prototype._moveTo=function(t){var i=this._currentIndex;this._direction=t>i?"next":"prev";for(var e=0;e<Math.abs(t-i);e++)this._move()},SimpleAdaptiveSlider.prototype._autoplay=function(t){if(this._config.autoplay)return"stop"===t?(clearInterval(this._intervalId),void(this._intervalId=null)):void(null===this._intervalId&&(this._intervalId=setInterval(function(){this._direction="next",this._move()}.bind(this),this._config.interval)))},SimpleAdaptiveSlider.prototype._addIndicators=function(){if(!this._$root.querySelector("."+INDICATOR_WRAPPER_CLASS)){var t=document.createElement(INDICATOR_WRAPPER_ELEMENT);t.className=INDICATOR_WRAPPER_CLASS;for(var i=0,e=this._$itemList.length;i<e;i++){var s=document.createElement(INDICATOR_ITEM_ELEMENT);s.className=INDICATOR_ITEM_CLASS,s.dataset.slideTo=i,t.appendChild(s)}this._$root.appendChild(t)}},SimpleAdaptiveSlider.prototype._refreshExtremeValues=function(){var t=this._$itemList;this._minOrder=parseInt(t[0].dataset.order),this._maxOrder=this._minOrder,this._$itemWithMinOrder=t[0],this._$itemWithMaxOrder=this._$itemWithMinOrder,this._minTranslate=parseInt(t[0].dataset.translate),this._maxTranslate=this._minTranslate;for(var i=0,e=t.length;i<e;i++){var s=t[i],n=parseInt(s.dataset.order);n<this._minOrder?(this._minOrder=n,this._$itemWithMinOrder=s,this._minTranslate=parseInt(s.dataset.translate)):n>this._maxOrder&&(this._maxOrder=n,this._$itemWithMaxOrder=s,this._minTranslate=parseInt(s.dataset.translate))}},SimpleAdaptiveSlider.prototype._balancingItems=function(){if(this._balancingItemsFlag){var t,i=this._$wrapper.getBoundingClientRect(),e=i.width/2,s=this._$itemList.length;if("next"===this._direction){var n=i.left,r=this._$itemWithMinOrder;t=this._minTranslate,r.getBoundingClientRect().right<n-e&&(r.dataset.order=this._minOrder+s,t+=100*s,r.dataset.translate=t,r.style.transform="translateX(".concat(t,"%)"),this._refreshExtremeValues())}else if("prev"===this._direction){var a=i.right,o=this._$itemWithMaxOrder;t=this._maxTranslate,o.getBoundingClientRect().left>a+e&&(o.dataset.order=this._maxOrder-s,t-=100*s,o.dataset.translate=t,o.style.transform="translateX(".concat(t,"%)"),this._refreshExtremeValues())}requestAnimationFrame(this._balancingItems.bind(this))}},SimpleAdaptiveSlider.prototype._addEventListener=function(){var t=this._$items;function i(t){this._autoplay("stop");var i=0===t.type.search("touch")?t.touches[0]:t;this._swipeStartPosX=i.clientX,this._swipeStartPosY=i.clientY,this._hasSwipeState=!0,this._hasSwiping=!1}function e(t){if(this._hasSwipeState){var i=0===t.type.search("touch")?t.touches[0]:t,e=this._swipeStartPosX-i.clientX,s=this._swipeStartPosY-i.clientY;if(!this._hasSwiping){if(Math.abs(s)>Math.abs(e))return void(this._hasSwipeState=!1);this._hasSwiping=!0}t.preventDefault(),this._config.loop||(this._currentIndex+1>=this._$itemList.length&&e>=0&&(e/=4),this._currentIndex<=0&&e<=0&&(e/=4));var n=e/this._$wrapper.getBoundingClientRect().width*100,r=this._transform-n;this._$items.classList.add(TRANSITION_NONE),this._$items.style.transform="translateX(".concat(r,"%)")}}function s(t){if(this._hasSwipeState){var i=0===t.type.search("touch")?t.changedTouches[0]:t,e=this._swipeStartPosX-i.clientX;this._config.loop||(this._currentIndex+1>=this._$itemList.length&&e>=0&&(e/=4),this._currentIndex<=0&&e<=0&&(e/=4));var s=e/this._$wrapper.getBoundingClientRect().width*100;this._$items.classList.remove(TRANSITION_NONE),s>SWIPE_THRESHOLD?(this._direction="next",this._move()):s<-SWIPE_THRESHOLD?(this._direction="prev",this._move()):(this._direction="none",this._move()),this._hasSwipeState=!1,this._config.loop&&this._autoplay()}}if(this._$root.addEventListener("click",function(t){var i=t.target;if(this._autoplay("stop"),i.classList.contains("slider__control"))t.preventDefault(),this._direction=i.dataset.slide,this._move();else if(i.dataset.slideTo){t.preventDefault();var e=parseInt(i.dataset.slideTo);this._moveTo(e)}this._config.loop&&this._autoplay()}.bind(this)),this._config.loop&&(t.addEventListener("transitionstart",function(){this._balancingItemsFlag=!0,window.requestAnimationFrame(this._balancingItems.bind(this))}.bind(this)),t.addEventListener("transitionend",function(){this._balancingItemsFlag=!1}.bind(this))),this._config.autoplay&&(this._$root.addEventListener("mouseenter",function(){this._autoplay("stop")}.bind(this)),this._$root.addEventListener("mouseleave",function(){this._config.loop&&this._autoplay()}.bind(this))),this._config.swipe){var n=!1;try{var r=Object.defineProperty({},"passive",{get:function(){n=!0}});window.addEventListener("testPassiveListener",null,r)}catch(t){}this._$root.addEventListener("touchstart",i.bind(this),!!n&&{passive:!1}),this._$root.addEventListener("touchmove",e.bind(this),!!n&&{passive:!1}),this._$root.addEventListener("mousedown",i.bind(this)),this._$root.addEventListener("mousemove",e.bind(this)),document.addEventListener("touchend",s.bind(this)),document.addEventListener("mouseup",s.bind(this))}this._$root.addEventListener("dragstart",function(t){t.preventDefault()}.bind(this)),document.addEventListener("visibilitychange",function(){"hidden"===document.visibilityState?this._autoplay("stop"):"visible"===document.visibilityState&&this._config.loop&&this._autoplay()}.bind(this))},SimpleAdaptiveSlider.prototype.next=function(){this._direction="next",this._move()},SimpleAdaptiveSlider.prototype.prev=function(){this._direction="prev",this._move()},SimpleAdaptiveSlider.prototype.autoplay=function(t){this._autoplay("stop")};
        document.addEventListener('DOMContentLoaded', function () {
            // инициализация слайдера
            var slider = new SimpleAdaptiveSlider('.slider', {
                loop: false,
                autoplay: false,
                interval: 5000,
                swipe: true,
            });
        });
    </script>
    <style>
        .slider__wrapper{
            position:relative;
            overflow:hidden;
            background-color:#eee
        }
        .slider__items{
            display:flex;
            transition:transform .5s ease
        }
        .transition-none{transition:none}
        .slider__item{
            flex:0 0 100%;
            max-width:100%;
            position:relative
        }
        .prev{
            width:40px;
            height:50px;
            transform:translateY(-50%);
            display:none;
            align-items:center;
            justify-content:center;
            color:#fff;
            background:rgba(0,0,0,.3);
            opacity:.5;
            user-select:none
        }
        .next{
            width:40px;
            height:50px;
            transform:translateY(-50%);
            display:none;
            align-items:center;
            justify-content:center;
            color:#fff;
            background:rgba(0,0,0,.3);
            opacity:.5;
            user-select:none
        }
        .slider__control_show{display:flex}
        .slider__control:focus,.slider__control:hover{
            color:#fff;
            text-decoration:none;
            opacity:.7
        }
        .slider__control::before{
            content:'';
            display:inline-block;
            width:20px;
            height:20px;
            background:transparent no-repeat center center;
            background-size:100% 100%
        }
        .slider__control_prev::before{
            background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E")}
        .slider__control_next::before{
            background-image:url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E")}
        .slider__indicators{
            position:absolute;
            left:0;
            right:0;
            bottom:10px;
            display:flex;
            justify-content:center;
            padding-left:0;
            margin:0 15%;
            list-style:none;
            user-select:none
        }
        .slider__indicator{
            flex:0 1 auto;
            width:30px;
            height:4px;
            margin-right:3px;
            margin-left:3px;
            background-color:rgba(255,255,255,.5);
            background-clip:padding-box;
            border-top:10px solid transparent;
            border-bottom:10px solid transparent;
            cursor:pointer
        }
        .slider__indicator_active{background-color:#fff}
        /* стили для элемента body */
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial,
            sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
        }

        /* дополнительные стили для этого примера */
        .slider__items {
            counter-reset: slide;
        }

        .slider__item {
            counter-increment: slide;
        }

        .slider__item>div::before {
            content: counter(slide);
            position: absolute;
            top: 10px;
            right: 20px;
            color: #fff;
            font-style: italic;
            font-size: 32px;
            font-weight: bold;
        }
        .slider{
            max-width: 690px;
            background: unset;
            min-height: unset;
            padding: 45px;
            margin-bottom: unset;
        }
        .kola{
            margin-left: 15px;
        }
</style>
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
                    <a style="text-decoration: none;color: black;width: 100%;height:40px;display: flex;align-items: center;justify-content: center;background: white;border-radius: 50px" href="{{route('cars')}}">Back</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Разметка слайдера -->
    <div class="container" style="display: flex;justify-content: space-between;">
        <div class="slider">
            <div class="slider__wrapper">
                <div class="slider__items" style="display:flex;">
                    @foreach($car->logo as $image)
                        <div class="slider__item">
                            <img style="object-fit: contain"  width="600" height="365" src="{{asset('storage/' . $image )}}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="display: flex;align-items: center;justify-content: space-evenly">
                <a class="slider__control slider__control_prev prev d-flex" href="#" role="button" data-slide="prev"></a>
                <a class="slider__control slider__control_next next d-flex" href="#" role="button" data-slide="next"></a>
            </div>
        </div>
        <div class="list-group" style="width: 100%;height: 405px;">
            <div class="list-group-item list-group-item-action active" aria-current="true" style="height: 100%;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: space-evenly;margin-top: 50px;
    background: #1B242F;
    border: #1B242F;">
                <div class="d-flex w-100 justify-content-between" style="border-bottom-style: ridge;">
                    Brand`<h5 class="mb-1">{{$car->car_brand}}</h5>
                </div>
                <div class="d-flex w-100 justify-content-between" style="border-bottom-style: ridge;">Model`<p>{{$car->car_model}}</p></div>
                <div class="d-flex w-100 justify-content-between" style="border-bottom-style: ridge;">Price`<p class="mb-1">{{$car->many}}$</p></div>
                <div class="d-flex w-100 justify-content-between" style="border-bottom-style: ridge;"><small>Additional Information<p>{{$car->content}}</p></small></div>
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
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-8 ftr2-bottom" style="width: 100%;">
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
@endsection