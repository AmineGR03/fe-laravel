@extends('admin.home')

@section('creation')
<div class="container">
    <h1>Add Product</h1>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="categorie">Category</label>
           <select class="form-control @error('category') is-invalid @enderror" id="categorie" name="categorie" required>
                <option value="">Choose a category</option>
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
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="info">Info</label>
            <textarea class="form-control @error('info') is-invalid @enderror" id="info" name="info" required>{{ old('info') }}</textarea>
            @error('info')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pic">Picture</label>
            <input type="file" class="form-control-file @error('pic') is-invalid @enderror" id="pic" name="pic" required>
            @error('pic')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
            @error('price')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="highlight">Highlight</label>
            <select class="form-control @error('highlight') is-invalid @enderror" id="highlight" name="highlight" required>
                <option value="1" {{ old('highlight') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('highlight') == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('highlight')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="highlight_note">Highlight Note</label>
            <textarea class="form-control @error('highlight_note') is-invalid @enderror" id="highlight_note" name="highlight_note">{{ old('highlight_note') }}</textarea>
            @error('highlight_note')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add </button>
    </form>
</div>
@endsection
