

<?php $__env->startSection('category_update'); ?>
    <div class="container mt-5">
        <h1>Update Category</h1>
        <form action="/admin/categories/edited/<?php echo e($category->id); ?>" method="POST" id="categoryForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="text" id="id" name="id" value="<?php echo e($category->id); ?>" hidden>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($category->name); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\PFE\pfe-laravel\resources\views/admin/editCategory.blade.php ENDPATH**/ ?>