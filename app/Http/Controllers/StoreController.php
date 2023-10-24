<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use mysql_xdevapi\TableUpdate;
use Spatie\Backtrace\Arguments\Reducers\StdClassArgumentReducer;

class StoreController extends Controller
{
    function index(Request $request){

        $SelectedName =$request->input("name");
        $SelectedCategorie =$request->input("categories");

        $min=$request->input("min") ?? 0;// default take 0
        $max =$request->input("max");


        $productsQuery=Product::query();// return all the products
        $categories =Category::with("products")->has("products")->get();
        if(!empty($SelectedName)){
            $productsQuery->where("name","like","%{$SelectedName}%");
        }
        if(!empty($SelectedCategorie)){
            $productsQuery->whereIn("category_id",$SelectedCategorie);
        }


        $productsQuery->where("price", '>=', $min);

        if(!empty($max)){
            $productsQuery->where("price",'<=',$max);
        }
        // range of the selected price the max and min

        $products=$productsQuery->orderBy("name")->get();
        $product_price =$productsQuery->pluck("price")->all();
        $max_price=max($product_price);
        $min_price=min($product_price);

        return view("Store.index",compact("products","categories","min_price","max_price"));
    }
}
