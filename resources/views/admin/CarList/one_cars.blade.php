@extends('layouts.admin_lay')
@section('title')
    CompanyPanel
@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div>Logotype Company`<img  style="width: 50px;height: 50px;border-radius: 50%" src="@if(isset($carList -> logo)){{asset('storage/' . $carList -> logo)}} @else {{asset('images/defolt.jpg')}} @endif"></div>
                <h2>Car Brand`{{ $carList -> car_brand }}</h2>
                <p>Car Model`  {{ $carList -> car_model }}</p>
                <p>Published`{{ $carList -> created_at }}</p>
                <div class="col-xs-12 col-md-6">
                    <form class="d-inline" action="{{ route('carList.edit', $carList) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                    </form>
                    <form class="d-inline" action="{{ route('carList.destroy', $carList->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter">
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
                    <a class="btn btn-outline-secondary" href="{{route('carList.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection