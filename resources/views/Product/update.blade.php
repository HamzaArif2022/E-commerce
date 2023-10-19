@extends("Base")
@section("title","Update")
@section("main")
    <h1>Update Product</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li class="alert alert-danger " role="alert">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route("products.update",$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old("name",$product->name)}}">
        </div>

        <div class="form-group">
            <label for="email">description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old("description",$product->description)}}">
        </div>
        <div class="form-group">
            <label for="image">quantity	:</label>
            <input type="text " class="form-control" id="quantity" name="quantity" value="{{old("quantity",$product->quantity)}}">
        </div>
        <div class="form-group">
            <label for="email">price:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{old("price",$product->price)}}">
        </div>
        <div class="form-group">
            <label for="image">image:</label>
            <input type="file" class="form-control" id="image" name="image"   >
            @if($product->image)
            <img src="/storage/{{$product->image}}" width="80px">
            @endif
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id">
                <option>Choose your Category</option>
                @foreach($categories as $category)

                    <option @selected(old("category_id",$product->category_id)  === $category->id) value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">update</button>
    </form>
@endsection
