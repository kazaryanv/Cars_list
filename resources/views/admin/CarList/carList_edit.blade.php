@extends('layouts.admin_lay')
@section('title')
    @if(isset($carList))
        Edit Car
    @else
        New Car
    @endif
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
    <div class="container">
        @if(isset($carList))
         Update Car List
        @else
            <h2>Create new Car List</h2>
        @endif
        <form action="{{ (isset($carList)) ? route('carList.update', $carList)  : route('carList.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(isset($carList))
                @method('put')
            @endif
            <div class="mb-3">
                <label for="logo" class="form-label">logo  carList</label>
                @if(isset($carList))
                    <img style="width: 50px;height: 50px;border-radius: 50%;margin-bottom: 5px" src="@if(isset($carList -> logo)){{asset('storage/' . $carList -> logo)}} @else {{asset('images/defolt.jpg')}} @endif" alt="">
                @endif
                <input value="{{(isset($carList)) ? $carList->logo : ''  }}" name="logo" type="file" class="form-control" id="logo" placeholder="logo">
            </div>

            <div class="mb-3">
                <label for="car_brand" class="form-label"> brand</label>
                <input  value="{{(isset($carList)) ? $carList->car_brand : '' }}" type="text" name="car_brand"  class="form-control" id="car_brand" placeholder="brand">
            </div>

            <div class="mb-3">
                <label for="car_model" class="form-label">car_model</label>
                <input  value="{{(isset($carList)) ? $carList->car_model : '' }}" type="text" name="car_model"  class="form-control" id="car_model" placeholder="car_model">
            </div>
            @if(isset($carList))
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
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
                                <button type="submit" class="btn btn-success btn-block">
                                    Yes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-outline-secondary" href="{{ route('carList.index') }}">Back</a>
            @else
                <button class="btn btn-primary">
                    Save
                </button>
                <a class="btn btn-outline-secondary" href="{{ route('carList.index') }}">Back</a>
            @endif

        </form>
    </div>
@endsection