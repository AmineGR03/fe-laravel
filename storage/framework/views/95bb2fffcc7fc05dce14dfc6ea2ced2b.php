

<?php $__env->startSection('products'); ?>
    <div class="container" style="border: 2px solid #000033; padding: 20px; margin-top: 20px;">
        <h1 class="mt-5">All Products</h1>
        <table class="table mt-4" border="1">
            <thead style="background-color: #000033; color: white;">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->categorie); ?></td>
                    <td>$<?php echo e($product->price); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.edit', $product->id)); ?>" class="btn btn-primary">Modify</a>
                        <form action="<?php echo e(route('admin.destroy', $product->id)); ?>" method="POST" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\PFE\pfe-laravel\resources\views/Admin/product.blade.php ENDPATH**/ ?>