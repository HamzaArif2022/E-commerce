@extends("users.Admin.main")
@section("title","Products")
@include("Store.FilterProduct")
@section("main")
    <div class="d-flex justify-content-between mt-4 align-items-center">
        <h1 >Last products </h1>
        @auth
            <a href="{{route("products.create")}}" class="btn btn-primary">Create Product</a>
        @endauth
    </div>
    <div class="row row-cols-1 row-cols-md-3 mt-4 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top h-20 " src="storage/{{$product->image}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{!! $product->description !!}</p>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Quantity:  <span class="badge bg-success">{{$product->quantity}}</span></span>
                            <span>F

                            Price: <span class="badge bg-primary">{{$product->price}} MAD</span>
                            </span>
                        </div>
                        <hr>
                        <div class="my-2">
                            Category: <span class="badge bg-primary">{{$product->category?->name}}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$product->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
