<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?>

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
            <?php echo $__env->make("layout/admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            
            <?php if(\App\Classes\Session::has("delete_success")): ?>
                <?php echo e(\App\Classes\Session::flash("delete_success")); ?>

            <?php endif; ?>

            <?php if(\App\Classes\Session::has("delete_fail")): ?>
                <?php echo e(\App\Classes\Session::flash("delete_fail")); ?>

            <?php endif; ?>
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
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                        <span style="float:right;">
                        <i class="fa fa-plus text-primary" style="cursor: pointer;" aria-hidden="true" 
                        onclick="showSubModel('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i> 
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="fun('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                        <a href="/admin/category/<?php echo e($cat->id); ?>/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div>
            <?php echo $pages; ?>

            </div>
            <!-- Category List End -->

            <!-- Sub Category List Start -->
            <div style="margin-top: 100px;">
            <ul class="list-group">
                <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                        <span style="float:right;"> 
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="subCatEdit('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                        <a href="/admin/category/<?php echo e($cat->id); ?>/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div>
            <?php echo $sub_pages; ?>

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
            <input type="hidden" id="edit_token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
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
            <input type="hidden" id="subcat_token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
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
            <input type="hidden" id="sub_cat_edit_token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>