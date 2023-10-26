@extends('layout.master')

@section("title","Developer")

@section('content')
<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Player</h3>
    <div class="row">
        @foreach($type as $product)
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header text-center" style="background-color: #222222;color:white;">
                    {{$product->name}}
                </div>
                <div class="card-block">
                    <img src="{{$product->image}}" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>${{$product->price}}</b></p>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Myanmar</h3>
    <div class="row">
        @foreach($myan as $product)
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block">
                    <img src="{{$product->image}}" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>${{$product->price}}</b></p>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Shirt</h3>
    <div class="row">
        @foreach($cloth as $product)
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block">
                    <img src="{{$product->image}}" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>${{$product->price}}</b></p>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- <div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">All</h3>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block">
                    <img src="{{$product->image}}" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>${{$product->price}}</b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            {!!$pages!!}
        </div>
    </div>
</div> -->
@endsection