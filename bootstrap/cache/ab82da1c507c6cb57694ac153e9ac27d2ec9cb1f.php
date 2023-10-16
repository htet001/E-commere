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
            <div style="margin-top: 100px;">
            <ul class="list-group">
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item rounded-0">
                        <a href="/admin/category/all"><?php echo e($cat->name); ?></a>
                        <span style="float:right;">
                        <i class="fa fa-pencil-square-o text-primary" aria-hidden="true" id="modelCaller" onclick="fun('<?php echo e($cat->name); ?>','<?php echo e($cat->id); ?>')"></i>
                        <a href="/admin/category/<?php echo e($cat->id); ?>/delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        </span>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div>
            <?php echo $pages; ?>

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
            <input type="hidden" id="edit_token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>