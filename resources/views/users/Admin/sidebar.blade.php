
@php
use \Illuminate\Support\Facades\Route;
// return the route name
$path=Route::currentRouteName();

$is_admin_dashboard=Route::is("admin_dashboard");
$is_categories=Route::is("categories.*");// "categories.*" .* : everything next to the point
$is_products=Route::is("products.*");
// using the dunamique class to intgrate variables
$defaultStyle="list-group-item list-group-item-action ";


@endphp

 <div class="list-group">
        <a href="{{route("admin_dashboard")}}" @class([$defaultStyle,"active"=>$is_admin_dashboard]) >Dashboard</a>
        <a href="{{route("products.index")}}" @class([$defaultStyle,"active"=>$is_products])>Products</a>
        <a href="{{route("categories.index")}}"  @class([$defaultStyle,"active"=>$is_categories])>Categories</a>
    </div>
