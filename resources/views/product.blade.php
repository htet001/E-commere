@extends('layout.master')

@section("title","Developer")

@section('content')

<div class="container my-5">
    <div class="card p-5">
        <div class="d-flex">
            <div class="col-md-3">
                <img src="{{$product->image}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-9" style="padding-left: 50px;">
                <h3 class="card-title">{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <button class="btn btn-warning">{{$product->price}}Ks</button>
                <button class="btn btn-success">Add To Cart</button>
                <p class="mt-3">
                    <span>
                        Rate:
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star-half text-warning"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection