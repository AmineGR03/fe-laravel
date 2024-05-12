

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chicken Forever Admin</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #000033;">
        <div class="container">
            <a class="navbar-brand" href="/admin" style="color: white;">Chicken Forever Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/products" style="color: white;">Products</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/create" style="color: white;">Create</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

<div class="container">
    <?php echo $__env->yieldContent('products'); ?>
    <?php echo $__env->yieldContent('creation'); ?>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html><?php /**PATH C:\Users\dell\Desktop\PFE\pfe-laravel\resources\views/Admin/home.blade.php ENDPATH**/ ?>