<div style="width: 1000px" class="row list-group d-flex justify-content-center align-items-center flex-wrap">
    <div class="item col-xs-4 col-lg-4 list-group-item">
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
    </div>
</div>