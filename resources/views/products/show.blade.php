<!DOCTYPE html>
<html>
    <head>
        <title>show</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('title', $product->name)
        
        @section('content')
        
            {{-- <div class="card">
        
                <h1>{{ $product->name }}</h1>
        
                <p>{{ $product->description }}</p>
        
                <h2>₹{{ $product->price }}</h2>
        
                <p>
                    <strong>Stock:</strong>
                    {{ $product->stock }}
                </p>
        
                <p>
                    <strong>Category:</strong>
                    {{ $product->category?->name ?? 'Uncategorized' }}
                </p>
                @if(auth()->user()->role === 'seller')
                <a href="/products/{{ $product->id }}/edit">
                    <button type="button">Edit Product</button>
                </a>
                @endif
                @if($product->stock > 0)
        
                    <form method="POST" action="/cart/add/{{ $product->id }}">
                        @csrf
        
                        <button type="submit">
                            Add to Cart
                        </button>
                    </form>
        
                @else
        
                    <p class="error">Out of stock</p>
        
                @endif



                @if ($product->image)
                    <img
                        src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}"
                        class="product-image"
                    >
                @endif
        
                <br>
        
                <a href="/products">← Back to Products</a>
        
            </div> --}}
            <div class="card">
            <div class="product-detail">

                <div class="product-info">
            
                    <h1>{{ $product->name }}</h1>
            
                    <p>{{ $product->description }}</p>
            
                    <h2>₹{{ $product->price }}</h2>
            
                    <p>
                        <strong>Stock:</strong> {{ $product->stock }}
                    </p>
            
                    <p>
                        <strong>Category:</strong>
                        {{ $product->category?->name ?? 'Uncategorized' }}
                    </p>
            
                    @if(auth()->user()->role === 'seller')
                        <a href="/products/{{ $product->id }}/edit">
                            <button type="button">Edit Product</button>
                        </a>
                    @endif
                        
                    @if(auth()->user()->role !== 'seller')
                        @if($product->stock > 0)
                            <form method="POST" action="/cart/add/{{ $product->id }}">
                                @csrf
                
                                <button type="submit">
                                    Add to Cart
                                </button>
                            </form>
                            @else
                            <p class="error">Out of stock</p>
                        @endif
                    @endif
            
                </div>
            
            
                <div class="product-image-container">
            
                    @if($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="product-image"
                        >
                    @endif
            
                </div>
            
            </div>
            
            <a href="/products">← Back to Products</a>
            </div>
        @endsection
    </body>
</html>