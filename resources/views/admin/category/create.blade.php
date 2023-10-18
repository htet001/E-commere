@extends ('layout.master')

@section ('title','Category Create')

@section ('content')

    <div class="container">
        <h1 class="text-warning text-center">Create Category</h1>
        <div class="row">
        <div class="col-md-4 my-5">
            @include("layout/admin_sidebar")
        </div>
        <div class="col-md-8">
            @include("layout.report_message")
            
            @if(\App\Classes\Session::has("delete_success"))
                {{\App\Classes\Session::flash("delete_success")}}
            @endif

            @if(\App\Classes\Session::has("delete_fail"))
                {{\App\Classes\Session::flash("delete_fail")}}
            @endif
            <!-- Form Start -->
            <form action=<?php use App\classes\CSRFToken;
                echo URL_ROOT."admin/category/create";?> method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <input type="hidden" name="token" value="<?php CSRFToken::_token()?>">
                <div class="row-no-gutters" id="createButton">
                    <button type="submit" class="btn btn-warning text-white">Create</button>
                </div>
            </form>
            <!-- Form End -->

            <!-- Category List Start -->
            <div style="margin-top: 100px;">
            <ul class="list-group">
                @foreach($cats as $cat)
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all">{{$cat->name}}</a>
                        <span style="float:right;">
                        <i class="fa fa-plus text-primary" style="cursor: pointer;" aria-hidden="true" 
                        onclick="showSubModel('{{$cat->name}}','{{$cat->id}}')"></i> 
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="fun('{{$cat->name}}','{{$cat->id}}')"></i>
                        <a href="/admin/category/{{$cat->id}}/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div>
            {!! $pages !!}
            </div>
            <!-- Category List End -->

            <!-- Sub Category List Start -->
            <div style="margin-top: 100px;">
            <ul class="list-group">
                @foreach($sub_cats as $cat)
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all">{{$cat->name}}</a>
                        <span style="float:right;"> 
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="subCatEdit('{{$cat->name}}','{{$cat->id}}')"></i>
                        <a href="/admin/subcategory/{{$cat->id}}/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div>
            {!! $sub_pages !!}
            </div>
            <!-- Sub Category List End -->
            </div>
        </div>
        </div>
    </div>

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
</body>
</html>

<!-- Modal Start -->
<div class="modal fade" id="CategoryUpdateModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Start -->
        <form>
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="edit_name">
            </div>
            <input type="hidden" id="edit_token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="edit_id">
            <div class="row-no-gutters" id="createButton">
                <button class="btn btn-warning text-white" onclick="startEdit(event)">Update</button>
            </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->

<!-- SubcatModal Start -->
<div class="modal fade" id="SubCategoryCreateModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Start -->
        <form>
            <div class="form-group">
                <label for="name">Parent Category</label>
                <input type="text" class="form-control" id="parent_cat_name">
            </div>
            <div class="form-group">
                <label for="name">Sub Category Name</label>
                <input type="text" class="form-control" id="sub_cat_name">
            </div>
            <input type="hidden" id="subcat_token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="parent_cat_id">
            <div class="row-no-gutters" id="createButton">
                <button class="btn btn-warning text-white" onclick="createSubCategory(event)">Create</button>
            </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!--SubcatModal End -->

<!-- SubCatModal Start -->
<div class="modal fade" id="SubCategoryEditModel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form Start -->
        <form>
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="sub_cat_edit_name">
            </div>
            <input type="hidden" id="sub_cat_edit_token" value="{{\App\Classes\CSRFToken::_token()}}">
            <input type="hidden" id="sub_cat_edit_id">
            <div class="row-no-gutters" id="createButton">
                <button class="btn btn-warning text-white" onclick="subCatUpdateStart(event)">Update</button>
            </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!-- SubCatModal End -->
@endsection

@section("script")
    <script>
        function fun(name,id){
            $("#edit_name").val(name);
            $("#edit_id").val(id);
            $("#CategoryUpdateModel").modal("show");
        }

        function startEdit($e){
            $e.preventDefault();
            var name = $("#edit_name").val();
            var token = $("#edit_token").val();
            var id = $("#edit_id").val();
            $('#CategoryUpdateModel').modal('hide');

            //alert("naem is "+name+"token is"+token+"id "+id);
            $.ajax({
                type:'POST',
                url:'/admin/category/update',
                data:{
                    name:name,
                    token:token,
                    id:id
                },
                success:function(result){
                    window.location.href = "create";
                },
                error:function(respone){
                    var str = "";
                    var resp = (JSON.parse(respone.responseText));
                    alert(resp.name);
                }
            });
        }

        function showSubModel(name,id){
            $('#parent_cat_name').val(name);
            $('#parent_cat_id').val(id);
            $('#SubCategoryCreateModel').modal('show');            
        }

        function createSubCategory($e){
            $e.preventDefault();
            var name = $('#sub_cat_name').val();
            var token = $('#subcat_token').val();
            var parent_cat_id = $('#parent_cat_id').val();
            $('#SubCategoryCreateModel').modal('hide');

            //alert("Name is "+name+"Token is"+token+"id is "+parent_cat_id);

            $.ajax({
                type:'POST',
                url:'/admin/subcategory/create',
                data:{
                    name:name,
                    token:token,
                    parent_cat_id:parent_cat_id
                },
                success:function(result){
                    window.location.href = "create";
                },
                error:function(respone){
                    var str = "";
                    var resp = (JSON.parse(respone.responseText));
                    alert(resp.name);
                }
            });
        }

        function subCatEdit(name,id){
            $('#sub_cat_edit_name').val(name);
            $('#sub_cat_edit_id').val(id);

            $('#SubCategoryEditModel').modal('show');
        }

        function subCatUpdateStart($e){
            $e.preventDefault();
            var name = $("#sub_cat_edit_name").val();
            var token = $("#sub_cat_edit_token").val();
            var id = $("#sub_cat_edit_id").val();
            $('#SubCategoryEditModel').modal('hide');

            //alert("naem is "+name+"token is"+token+"id "+id);
            $.ajax({
                type:'POST',
                url:'/admin/subcategory/update',
                data:{
                    name:name,
                    token:token,
                    id:id
                },
                success:function(result){
                    window.location.href = "create";
                },
                error:function(respone){
                    var str = "";
                    var resp = (JSON.parse(respone.responseText));
                    alert(resp.name);
                }
            });
        }
    </script>
@endsection