@extends('admin.home')

@section('category_update')
    <div class="container mt-5">
        <h1>Update Category</h1>
        <form action="/admin/categories/edited/{{ $category->id }}" method="POST" id="categoryForm">
            @csrf
            @method('PUT')
            <input type="text" id="id" name="id" value="{{ $category->id }}" hidden>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
