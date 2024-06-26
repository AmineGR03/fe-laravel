@extends('admin.home')

@section('creation')
<div class="container">
    <h1>Edit Product</h1>
    <form action="/admin/product/edited/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="categorie">Category</label>
            <select class="form-control @error('category') is-invalid @enderror" id="categorie" name="categorie" required>
                <option value="{{ $menu->categorie }}">{{ $menu->categorie }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categorie')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $menu->name }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="info">Info</label>
            <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info" required>{{ $menu->info }}</textarea>
            @error('info')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <input type="hidden" id="old_pic" name="old_pic" value="{{ $menu->pic }}"> <!-- Hidden input field to store old image URL -->

        <div class="form-group">
            <label for="pic">Picture</label>
            <input type="file" class="form-control-file @error('pic') is-invalid @enderror" id="pic" name="pic" accept="image/*">
            @error('pic')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $menu->price }}" required>
            @error('price')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="highlight">Highlight</label>
            <select class="form-control @error('highlight') is-invalid @enderror" id="highlight" name="highlight" required>
                <option value="">Choose an option</option>
                <option value="1" {{ $menu->highlight == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $menu->highlight == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('highlight')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="highlight_note">Highlight Note</label>
            <textarea class="form-control @error('highlight_note') is-invalid @enderror" id="highlight_note" name="highlight_note">{{ $menu->highlight_note }}</textarea>
            @error('highlight_note')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {
        const picInput = document.getElementById("pic");
        const oldPicUrl = "{{ $menu->pic }}";
        document.getElementById("old_pic").value = oldPicUrl;
        picInput.value = ""; 
    });
</script>
@endsection
