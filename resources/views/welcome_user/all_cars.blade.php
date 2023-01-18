@extends('layouts.about')
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
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
    <div class="about">
        <div class="container">
            <div class="abt-btm-grids">
                <div class="d-flex align-items-center justify-content-end">
                </div>
                <div class="container">
                    <div class="container" style="display: flex;justify-content: space-between">
                      <div style="padding-right: 20px;margin-right: 10px;">
                          <form id="brandsForm">
                              @foreach(\App\Models\Brand::all()  as $row)
                                  <div class="form-check form-switch">
                                      <input class="form-check-input car_brands" name="car_brand[]" id="car_brands_{{$row->id}}" type="checkbox" value="{{$row->car_brand}}">
                                      <label class="form-check-label" for="car_brands_{{$row->id}}">
                                          {{$row->car_brand}}
                                      </label>
                                  </div>
                              @endforeach
                              <button type="submit">Search</button>
                          </form>
                      </div>
                        <div style="width: 1000px" id="cars" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
                            @if(request()->ajax())
                                @include('welcome_user.filter')
                                @else
                                <div style="width: 1000px" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="item col-xs-4 col-lg-4 list-group-item">
                                        @foreach($cars as $car)
                                        <div class="thumbnail myTable">
                                            <img class="group list-group-image" src="{{asset('storage/' . $car->logo[0])}}" alt="1" />
                                            <div class="caption">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <h4  class="group inner list-group-item-heading">{{$car->car_brand}}</h4>
                                                        <p class="group inner list-group-item-text">
                                                            {{$car->car_model}}
                                                        </p>
                                                        <p  class="lead">{{$car->many}}$</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <a class="btn btn-success" href="{{route('show',$car)}}">Show</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.dropdown-menu').dropdown();
                        $("#myInput").on("keyup", function () {
                            let value = $(this).val().toLowerCase();
                            $("#myTable ").filter(function () {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                        /////////////
                        $("#brandsForm").on('submit', function (event) {
                            event.preventDefault();
                            let car_brand = $(this).data();
                            console.log($(this).serialize());
                            $.ajax({
                                url: "{{route('cars')}}",
                                type:"GET",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: $(this).serialize(),
                                success: (data) => {
                                    $('#cars').html(data);
                                },
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

            </div>
        </div>
    </div>
@endsection