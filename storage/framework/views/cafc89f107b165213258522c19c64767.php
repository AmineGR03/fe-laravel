

<?php $__env->startSection('update_product'); ?>
    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form action="/admin/product/edited/<?php echo e($menu->id); ?>" method="POST" id="productForm">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($menu->name); ?>" required>
            </div>
            <div class="form-group">
                <label for="info">Info:</label>
                <textarea class="form-control" id="info" name="info" rows="3" required><?php echo e($menu->info); ?></textarea>
            </div>
            <div class="form-group">
                <label for="pic">Picture:</label>
                <input type="file" class="form-control-file" id="pic" name="pic" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" value="<?php echo e($menu->price); ?>" required>
            </div>
            <div class="form-group">
                <label>Highlight:</label><br>
                <label class="radio-inline">
                    <input type="radio" name="highlight" value="1" id="highlightYes" <?php echo e(($menu->highlight == 1)? 'checked' : ''); ?>> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="highlight" value="0" id="highlightNo" <?php echo e(($menu->highlight == 0)? 'checked' : ''); ?>> No
                </label>
            </div>
            <div class="form-group" id="highlightNoteGroup">
                <label for="highlightNote">Highlight Note:</label>
                <input type="text" class="form-control" id="highlightNote" name="highlight_note" value="<?php echo e($menu->highlight_note); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-4">
            <h3>Categories:</h3>
            <select class="form-control" id="categorie" name="categorie" required>
                <option value="">Choose a category</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->name); ?>" <?php echo e(($menu->categorie == $category->name)? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const highlightYes = document.getElementById("highlightYes");
            const highlightNo = document.getElementById("highlightNo");
            const highlightNoteGroup = document.getElementById("highlightNoteGroup");

            highlightYes.addEventListener("change", function() {
                if (highlightYes.checked) {
                    highlightNoteGroup.style.display = "block";
                }
            });

            highlightNo.addEventListener("change", function() {
                if (highlightNo.checked) {
                    highlightNoteGroup.style.display = "none";
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\dell\Desktop\PFE\pfe-laravel\resources\views/admin/edit.blade.php ENDPATH**/ ?>