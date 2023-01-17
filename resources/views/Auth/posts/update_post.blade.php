@extends('layouts.about')
@section('title')
    @if(isset($cars))
        Edit Cars
    @else
        New Cars
    @endif
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div style="width: 100%;height: auto">
    <div class="container">
        <div class="form-row mb-5 pb-5 mt-5 pt-5">
        @if(isset($cars))
            <h2>Update Cars List</h2>
        @else
            <h2>Create new Cars List</h2>
        @endif
        <form action="{{ (isset($cars)) ? route('cars.update', $cars)  : route('cars.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($cars))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo post</label>
                @if(isset($cars))
                    <img class="col" style="width: 80px;height: 60px; border-radius: 50%;margin-bottom: 20px;" src="{{asset('storage/' . $cars->logo[0] )}}">
                @endif
                <input value="{{(isset($cars)) ? : ''  }}" name="logo[]" type="file" class="form-control" id="logo" multiple placeholder="logo">
            </div>
            <select class="form-control" id="car_brand"  name="car_brand">
                <option value="">Please select a car brand</option>
                @foreach(\App\Models\Brand::all() as $carList)
                    <option @if((isset($cars)) ? $cars->car_brand :  '') selected @endif value="{{$carList->car_brand}}">{{$carList->car_brand}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_model"  name="car_model">
                <option value="">Please select a car model</option>
                @foreach(\App\Models\Brand::all() as $carList)
                    <option @if((isset($cars)) ? $cars->car_model  :  '') selected @endif value="{{$carList->car_model}}">{{$carList->car_model}}</option>
                @endforeach
            </select>
            <br>
            <select class="form-control" id="car_years"  name="car_years">
                <option>Please select a car years</option>
                @for($i=1971;$i<date('Y');$i++)
                    <option @if((isset($cars)) ? $cars->car_years : '' ) selected @endif value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
            <br>
            <select class="form-control" id="car_Engine_capacity"  name="car_Engine_capacity">
                <option>Please select a car engine capacity(kamel matori litr@)</option>
                @for($i=0.5;$i<=7;$i++)
                    <option @if((isset($cars)) ? $cars->car_Engine_capacity :  '') selected @endif value="{{$i}}">{{$i}}L</option>
                @endfor
            </select>
            <br>
            <select class="form-control" id="car_Transmission"  name="car_Transmission">
                <option>Please select a car transmission</option>
                @foreach(['Aftomat','Mexanika'] as $carList)
                    <option @if((isset($cars)) ? $cars->car_Transmission : '') selected @endif value="{{$carList}}">{{$carList}}</option>
                @endforeach
            </select>
            <br>
            <div class="mb-3">
                <label for="many" class="form-label">price</label>
                <input value="{{(isset($cars)) ? $cars->many : '' }}" type="text" name="many"  class="form-control" id="many" placeholder="price">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea name="content"  class="form-control" id="content" placeholder="content">
                    {{(isset($cars)) ? $cars->content : '' }}
                </textarea>
            </div>
            @if(isset($cars))
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                    Update
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
                                Are you sure you want to Update this entry?
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
                <a href="{{ route('cars.index') }}">Go Back Home</a>
            @else
                <button class="btn btn-success">
                    Save
                </button>
                <a href="{{ route('cars.index') }}">Back</a>
            @endif
        </form>
        </div>
    </div>
</div>
@endsection