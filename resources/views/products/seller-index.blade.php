<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('title','My Products')

        @section('content')

            <h1> My Products</h1>
            <a href="/products/create"><button>Add Product</button></a>
            <br><br>

            @foreach($products as $product)
                <div class="card">
                    <h2>{{$product->name}}</h2>
                    <p>{{$product->description}}</p>
                    <p>₹{{$product->price}}</h2>
                    <p>{{$product->stock}}</p>
                
                    <p>
                        Category:
                        {{ $product->category?->name ?? 'Uncategorized' }}
                    </p>

                    <a href="/products/{{ $product->id }}/edit" style="text-decoration: none;">
                        <button>Edit</button>
                    </a>

                    <a href="/products/{{$product->id}}">
                        <button>View</button>
                    </a>
                </div>
                <br><br>
            @endforeach

        @endsection
    </body>
</html>