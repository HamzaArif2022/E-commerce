@guest
    @section("sidebar")

        <form class="form-group" method="get" >
            <div class="form-input">

                <input type="text" class="form-contol" name="name" id="name" value="{{request()->input("name")}}"
                       placeholder="Product name"/>
            </div>

            <h3 class="my-2">Categories</h3>

            @php
                $checkedCategory =request()->input("categories") ?? [];
            @endphp

            @foreach($categories as $category)
                <div class="form-check my-2">
                    <input type="checkbox" class="form-check-input"
                           @checked(in_array($category->id,$checkedCategory  )) name="categories[]"
                           value="{{$category->id}}"
                           id="categories"/>
                    <label class="form-check-label">{{$category->name}}</label>
                </div>

            @endforeach
            <h3 class="my-2">Price</h3>

            <div class="form-input  my-2">
                <label class="">Min:</label>
                <input type="number"  class="form-control" name="min"/>
                <label class="">Max:</label>
                <input type="number"  class="form-control" name="max"/>
            </div>


            <input type="submit" value="filter" class="btn btn-primary"/>
            <a href="{{route("home_page")}}" type="reset" value="reset" class="btn btn-secondary">reset</a>
        </form>
    @endsection
@endguest
