@extends('admin.home')
@section('categories')
    <h2>Ajouter Des Categories</h2>
    <form action="/admin/categories-create" method="POST">
        @csrf
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
            @foreach ($categories as $category) 
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/admin/categories/edit/{{ $category->id }}" class="btn btn-primary">Modify</a>
                    <form action="/admin/categories/destroy/{{ $category->id }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endSection