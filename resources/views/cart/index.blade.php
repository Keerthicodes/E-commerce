<!DOCTYPE html>
<html>
    <head>
        <title>cart</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('title', 'Shopping Cart')
        
        @section('content')
        
            <h1>Shopping Cart</h1>
        
            @if(session('error'))
                <p class="error">{{ session('error') }}</p>
            @endif
        
            @if(count($cart) == 0)
        
                <div class="card">
                    <h2>Your cart is empty</h2>
        
                    <a href="/products">
                        <button>Start Shopping</button>
                    </a>
                </div>
        
            @else
        
                @php
                    $total = 0;
                @endphp
        
                @foreach($cart as $id => $item)
        
                    <div class="card" style="margin-bottom: 20px;">
        
                        <h2>{{ $item['name'] }}</h2>
        
                        <p>
                            Price: ₹{{ $item['price'] }}
                        </p>
        
                        <p>
                            Quantity: {{ $item['quantity'] }}
                        </p>
        
                        <p>
                            Subtotal:
                            ₹{{ $item['price'] * $item['quantity'] }}
                        </p>
        
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
        
                        <form method="POST" action="/cart/remove/{{ $id }}">
                            @csrf
                            @method('DELETE')
        
                            <button type="submit">
                                Remove
                            </button>
                        </form>
        
                    </div>
        
                @endforeach
        
                <div class="card">
        
                    <h2>Total: ₹{{ $total }}</h2>
        
                    <form method="POST" action="/checkout">
                        @csrf
        
                        <button type="submit">
                            Checkout
                        </button>
                    </form>
        
                </div>
        
            @endif
        
        @endsection
    </body>
</html>