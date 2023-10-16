@extends ('layout.master')

@section ('title','Category Create')

@section ('content')

<style>
    .pagination{
        margin-top: 20px;
        justify-content: center;
    }
    .pagination > li{
        padding: 5px 15px;
        background: #ddd;
        margin-right: 1px;
    }
</style>

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
            <div style="margin-top: 100px;">
            <ul class="list-group">
                @foreach($cats as $cat)
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all">{{$cat->name}}</a>
                        <span style="float:right;">
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="fun('{{$cat->name}}','{{$cat->id}}')"></i>
                        <a href="/admin/category/{{$cat->id}}/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div>
            {!! $pages !!}
            </div>
            </div>
        </div>
        </div>
    </div>

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
</body>
</html>

<!-- Modal Start -->
<div class="modal" tabindex="-1" id="CategoryEditModel">
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
                <button class="btn btn-warning text-white" onclick="startEdit(event)">Create</button>
            </div>
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->
@endsection

@section("script")
    <script>
        function fun(name,id){
            $("#edit_name").val(name);
            $("#edit_id").val(id);
            $("#CategoryEditModel").modal("show");
        }

        function startEdit(e){
            e.preventDefault();
            name = $("#edit_name").val();
            token = $("#edit_token").val();
            id = $("#edit_id").val();

            console.log("Name is "+name+"<br> Token is "+token+" id is "+id);

            $.ajax({
                type:'POST',
                url:'/admin/category/'+name+'/update',
                data:{
                    name:name,
                    token:token,
                    id:id
                },
                success:function(result){
                    console.log(result);
                },
                error:function(respone){
                     
                }
            });
        }
    </script>
@endsection