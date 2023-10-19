<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    function index(){
        $products=Product::query()->latest()->get();
        return view("Store.index",compact("products"));
    }
}
