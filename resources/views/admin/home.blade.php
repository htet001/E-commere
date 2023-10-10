@extends("layout.master")

@section("title","Admin Home Page")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 my-5">
            @include("layout/admin_sidebar")
        </div>
        <div class="col-md-8"></div>
    </div>
</div>

@endsection