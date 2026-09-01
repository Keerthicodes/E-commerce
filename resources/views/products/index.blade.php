<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
    </head>
    <body>
        @extends('layouts.app')

@section('title', 'Products')

@section('content')

    <h1>Products</h1>

    @auth

        @if(auth()->user()->role === 'seller')

            <a href="/products/create">
                <button>Add Product</button>
            </a>

        @endif

    @endauth

    <br><br>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">

        @foreach($products as $product)

            <div class="card">

                <h2>{{ $product->name }}</h2>

                <p>{{ $product->description }}</p>

                <h3>₹{{ $product->price }}</h3>

                <p>Stock: {{ $product->stock }}</p>

                <p>
                    Category:
                    {{ $product->category?->name ?? 'Uncategorized' }}
                </p>

                <a href="/products/{{ $product->id }}">
                    <button>View Product</button>
                </a>
                <br><br>
               <!-- @if(auth()->user()->role !== 'seller')  -->
                    <form method="POST"
                        action="/cart/add/{{ $product->id }}"
                        style="display:inline;">

                        @csrf

                        <button type="submit">Add to Cart</button>

                    </form>
               <!--  @endif -->
            </div>

        @endforeach

    </div>

@endsection
    </body>
</html>