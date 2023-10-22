@extends("users.Admin.main")
@section("title","create")
@section("main")
    <form action="{{ route("categories.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
        </div>
        <div class="form-group my-3">
            <input type="submit" class="btn btn-primary w-100">
        </div>
    </form>
@endsection
