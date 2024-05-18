<?php $__env->startSection('categories'); ?>
    <h2>Ajouter Des Categories</h2>
    <form action="/admin/categories-create" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <h2>Liste Des Categories</h2>
    <table class="table">
        <thead>
            <tr>    
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <tr>
                <td><?php echo e($category->name); ?></td>
                <td>
                    <a href="/admin/categories/edit/<?php echo e($category->id); ?>" class="btn btn-primary">Modify</a>
                    <form action="/admin/categories/destroy/<?php echo e($category->id); ?>" method="POST" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\PFE\pfe-laravel\resources\views/admin/categories.blade.php ENDPATH**/ ?>