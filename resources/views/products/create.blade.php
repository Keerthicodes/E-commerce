<!DOCTYPE html>
<html>
    <head>
        <title>create</title>
    </head>
    <body>
        {{-- <h1>Add Product</h1>

        <form method="POST" action="/products">
            @csrf

            <label>Name:</label>
            <input type="text" name="name">

            <br><br>

            <label>Description:</label>
            <textarea name="description"></textarea>

            <br><br>

            <label>Price:</label>
            <input type="number" step="0.01" name="price">

            <br><br>

            <label>Stock:</label>
            <input type="number" name="stock">

            <br><br>

            <button type="submit">Add Product</button>
        </form> --}}
        @extends('layouts.app')

            @section('content')

            <div class="product-form-container">

                <div class="form-header">
                    <h1>Add New Product</h1>
                    <p>Add a product to your store</p>
                </div>

                @if ($errors->any())
                    <div class="error-box">
                        <strong>Please fix the following errors:</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/products" method="POST" enctype="multipart/form-data" class="product-form">

                    @csrf

                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            placeholder="e.g. MacBook Pro"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Enter product description"
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-row">

                        <div class="form-group">
                            <label for="price">Price (₹)</label>
                            <input
                                type="number"
                                name="price"
                                id="price"
                                value="{{ old('price') }}"
                                min="0"
                                step="0.01"
                                placeholder="150000"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input
                                type="number"
                                name="stock"
                                id="stock"
                                value="{{ old('stock') }}"
                                min="0"
                                placeholder="10"
                                required
                            >
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>

                        <select name="category_id" id="category_id" required>

                            <option value="">Select a category</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                        <a href="/categories/create"><h5> Unable to find your category ? </h5></a>
                    </div>

                    <div class="form-group">
                        <label for="image">Product Image</label>
                    
                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                        >
                    </div>

                    <div class="form-actions">
                        <a href="/products" class="cancel-btn">Cancel</a>

                        <button type="submit" class="submit-btn">
                            Add Product
                        </button>
                    </div>

                </form>

            </div>

            @endsection
    </body>
</html>