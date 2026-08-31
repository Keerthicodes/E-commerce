<!DOCTYPE html>
<html>
    <head>
        <title>edit</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('title', $product->name)
        
        @section('content')
        
        <div class="card">
        
            <h1>Edit Product</h1>
        
            <form method="POST"
                  action="/products/{{ $product->id }}"
                  enctype="multipart/form-data">
        
                @csrf
                @method('PUT')
        
                <label>Product Name</label>
                <input
                    type="text"
                    name="name"
                    value="{{ $product->name }}"
                    required
                >
        
                <label>Description</label>
                <textarea name="description" required>{{ $product->description }}</textarea>
        
                <label>Price (₹)</label>
                <input
                    type="number"
                    name="price"
                    value="{{ $product->price }}"
                    required
                >
        
                <label>Stock</label>
                <input
                    type="number"
                    name="stock"
                    value="{{ $product->stock }}"
                    required
                >
        
                <label>Category</label>
                <select name="category_id" required>
                    @foreach($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
        
                <label>Product Image</label>
        
                @if($product->image)
                    <div class="current-image">
                        <p>Current image:</p>
        
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-image"
                        >
                    </div>
                @endif
        
                <input
                    type="file"
                    name="image"
                    accept=".jpg,.jpeg,.png,.webp"
                >
        
                <button type="submit">
                    Update Product
                </button>
        
            </form>
        
        </div>
        
        @endsection
    </body>
</html>