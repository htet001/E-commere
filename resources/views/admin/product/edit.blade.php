@extends("layout.master")

@section("title","Product Edit Page")

@section("content")

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            @include("layout.admin_sidebar")
        </div>
        <div class="col-md-8">
        @include("layout.report_message")
            <!-- Form Start -->
            <form action="/admin/product/{{$product->id}}/edit" method="post" enctype="multipart/form-data"
                class="table-bordered pb-5 px-5"
                style="background-image: url(<?php echo URL_ROOT . "assets/images/back1.png" ?>);background-size: cover;">
                <h3 class="text-center pt-5 text-warning">Product Create Page</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="text-info">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="text-info">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" value="{{$product->price}}">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id" class="text-info">Category</label>
                            <select class="form-select" aria-label="Default select example" id="cat_id" name="cat_id">
                                @foreach($cats as $cat)
                                <option value="{{$cat->id}}" <?php echo $cat->id == $product->cat_id ? 'selected' : '' ?>>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_cat_id" class="text-info">Sub Category</label>
                            <select class="form-select" aria-label="Default select example" id="sub_cat_id"
                                name="sub_cat_id">
                                @foreach($subcats as $cat)
                                <option value="{{$cat->id}}" <?php echo $cat->id == $product->sub_cat_id ? 'selected' : '' ?>>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label text-info">Input File</label>
                    <input class="form-control" type="file" id="file" name="file">
                </div>
                
                <input type="hidden" name="old_image" value="{{$product->image}}">

                <div class="form">
                    <label for="description" class="text-info">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        style="height: 100px">{{$product->description}}</textarea>
                </div>
                <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                <div class="d-flex flex-row-reverse my-4">
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 10px;">Update</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                </div>
            </form>
            <!-- Form End -->
            
        </div>
    </div>
</div>

@endsection