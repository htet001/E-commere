@extends("layout.master")

@section("title","Product Home Page")

@section("content")

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">
            @if(\App\classes\Session::has("product_insert_success"))
                {{\App\classes\Session::flash("product_insert_success")}}
            @endif 
        <!-- Table Start -->
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="text-muted">
                <th>{{$product->id}}</th>
                <td><img src="{{$product->image}}" alt="" style="max-width: 150px;max-height: 100px;"></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                <a href="/admin/product/{{$product->id}}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a href="/admin/product/{{$product->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        <!-- Table End -->
            <div>
                {!! $pages !!}
            </div>
        </div>
    </div>
</div>

@endsection