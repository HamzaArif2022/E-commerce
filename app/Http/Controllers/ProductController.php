<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // dispaly all product
    {
        $products = Product::query()->with("category")->paginate(4);// with is more performance then all
        return view("users.Admin.Product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view("users.Admin.Product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $FormFeilds = $request->validated();
        if ($request->hasFile("image")) {
            $FormFeilds["image"] = $request->file("image")->store("product", "public");
        }

        Product::create($FormFeilds);
        return to_route("products.index")->with("message", "created successfully ");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();


        return view("users.Admin.Product.update", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)

    {
        $FormFields = $request->validated();

        // Check if the "image" field is present in the request data
        if ($request->hasFile('image')) {
            // Handle image update
            // Assuming you have an "image" field in your Product model that stores the image path.
            // You may need to configure file upload and storage as per your application's requirements.
            $imagePath = $request->file('image')->store("product", "public"); // Example storage folder name
            $FormFields['image'] = $imagePath; // Update the "image" field with the new image path.
        } else {
            // If "image" field is not present in the request data, retain the old value
            $FormFields['image'] = $product->image;
        }

        $product->fill($FormFields)->save();

        return to_route("products.index")->with("message", "update successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route("products.index")->with("message", "deleted successfully");
    }
}
