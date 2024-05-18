@extends('admin.home')

@section('update_product')
    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form action="/admin/product/edited/{{ $menu->id }}" method="POST" id="productForm">
            @csrf
            @method('PUT')
            <div class="form-group">    
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
            </div>
            <div class="form-group">
                <label for="info">Info:</label>
                <textarea class="form-control" id="info" name="info" rows="3" required>{{ $menu->info }}</textarea>
            </div>
            <div class="form-group">
                <label for="pic">Picture:</label>
                <input type="file" class="form-control-file" id="pic" name="pic" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" value="{{ $menu->price }}" required>
            </div>
            <div class="form-group">
                <label>Highlight:</label><br>
                <label class="radio-inline">
                    <input type="radio" name="highlight" value="1" id="highlightYes" {{ ($menu->highlight == 1)? 'checked' : '' }}> Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="highlight" value="0" id="highlightNo" {{ ($menu->highlight == 0)? 'checked' : '' }}> No
                </label>
            </div>
            <div class="form-group" id="highlightNoteGroup">
                <label for="highlightNote">Highlight Note:</label>
                <input type="text" class="form-control" id="highlightNote" name="highlight_note" value="{{ $menu->highlight_note }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-4">
            <h3>Categories:</h3>
            <select class="form-control" id="categorie" name="categorie" required>
                <option value="">Choose a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}" {{ ($menu->categorie == $category->name)? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
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
@endsection
