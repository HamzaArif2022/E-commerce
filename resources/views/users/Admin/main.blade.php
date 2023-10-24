@extends("layouts.app")
@auth
@section("sidebar")
    @include("users.Admin.sidebar") {{--always display--}}
@endsection
@endauth
