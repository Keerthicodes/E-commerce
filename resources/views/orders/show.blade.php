<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
{{-- 
    <h1>Order #{{ $order->id }}</h1>

    <p>User ID: {{ $order->user_id }}</p>

    <p>Total: ₹{{ $order->total }}</p>

    <h2>Items</h2>

    @foreach($order->items as $item)
        <div>
            <p>Product: {{ $item->product->name }}</p>
            <p>Quantity: {{ $item->quantity }}</p>
            <p>Price: ₹{{ $item->price }}</p>
            
            <hr>
        </div>
    @endforeach --}}
    @extends('layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')

    <h1>Order #{{ $order->id }}</h1>

    <div class="card">

        <h2>Order Summary</h2>

        <p>
            <strong>Total:</strong>
            ₹{{ $order->total }}
        </p>

        <h2>Items</h2>

        @foreach($order->items as $item)

            <div>
                <h3>{{ $item->product->name }}</h3>

                <p>
                    Quantity: {{ $item->quantity }}
                </p>

                <p>
                    Price: ₹{{ $item->price }}
                </p>
            </div>

            <hr>

        @endforeach

        <a href="/orders">
            <button>My Orders</button>
        </a>

    </div>

@endsection

</body>
</html>