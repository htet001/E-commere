@extends('layout.master')

@section("title","Developer")

@section('content')
<div class="container mt-4">
    <h2 style="text-align: center;">MLBB Popular Player</h2>
    <div class="row">
        @foreach($featured as $product)
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="{{$product->image}}" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>${{$product->price}}</b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">Myanmar MLBB Legendary Player</h2>
    <div class="row">
        @foreach($myan as $product)
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="{{$product->image}}" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>${{$product->price}}</b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">Jersey</h2>
    <div class="row">
        @foreach($jersey as $product)
        <div class="col-md-2">
            <div class="card mt-3">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="{{$product->image}}" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>${{$product->price}}</b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">ALL</h2>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    {{$product->name}}
                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="{{$product->image}}" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>${{$product->price}}</b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/{{$product->id}}/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('{{$product->id}}')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            {!!$pages!!}
        </div>
    </div>
</div>
@endsection