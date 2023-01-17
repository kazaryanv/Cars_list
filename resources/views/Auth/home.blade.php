@extends('layouts.about')
@section('title')
    Home-My-CarPosts
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
@endsection
@section('content')
    <div class="container">
        <div class="abt-btm-grids mt-3 pt-3 mb-3 pb-3">
            <div class="d-flex align-items-center justify-content-end">
            </div>
            <div class="container">
                <div class="container" style="display: flex;justify-content: space-between;flex-direction: column;align-items: center">
                    <a href="{{route('cars.create')}}" class="ml-4 mb-3" style="width: 1000px;height: auto">Create new Cars</a>
                    <div style="padding-right: 20px;margin-right: 10px;"></div>
                    <div style="width: 1000px" id="cars" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
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
                                                    <a class="btn btn-success" href="{{route('cars.show' , $car->id)}}">Show</a>
                                                    <form class="d-inline" action="{{ route('cars.edit', $car->id) }}" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Edit</button>
                                                    </form>

                                                    <form class="d-inline" action="{{ route('cars.destroy', $car->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                                            Delete
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">entry</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div style="cursor: default"  class="modal-body">
                                                                        Are you sure you want to Delete this entry?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">No</button>
                                                                        <button type="submit" class="btn btn-danger btn-block">
                                                                            Yes
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
