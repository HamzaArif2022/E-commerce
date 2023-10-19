@extends("Base")
@section("title","update")
@section("main")
    <form action="{{ route("categories.update",$category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name',$category->name)}}">
        </div>
        <div class="form-group my-3">
            <input type="submit" class="btn btn-primary w-100">
        </div>
    </form>
@endsection
