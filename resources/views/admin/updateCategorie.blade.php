@extends('admin.home')

@section('category_update')
    <div class="container mt-5">
        <h1>Update Category</h1>
        <form action="" method="POST" enctype="multipart/form-data" id="categoryForm">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <div class="form-group">
                <label for="info">Info:</label>
                <textarea class="form-control" id="info" name="info" rows="3" required>{{ $category->info }}</textarea>
            </div>
            <div class="form-group">
                <label for="pic">Picture:</label>
                <input type="file" class="form-control-file" id="pic" name="pic" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>