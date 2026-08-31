<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
</head>
<body>
{{-- 
    <h1>My Orders</h1>

    @foreach($orders as $order)

        <div>
            <h3>Order #{{ $order->id }}</h3>

            <p>Total: ₹{{ $order->total }}</p>

            <a href="/order/{{ $order->id }}">
                View Order
            </a>
        </div>

        <hr>

    @endforeach --}}

    @extends('layouts.app')

@section('title', 'My Orders')

@section('content')

    <h1>My Orders</h1>

    @if(count($orders) == 0)

        <div class="card">
            <p>You haven't placed any orders yet.</p>

            <a href="/products">
                <button>Start Shopping</button>
            </a>
        </div>

    @else

        @foreach($orders as $order)

            <div class="card" style="margin-bottom: 20px;">

                <h2>Order #{{ $order->id }}</h2>

                <p>
                    Total: ₹{{ $order->total }}
                </p>

                <a href="/order/{{ $order->id }}">
                    <button>View Order</button>
                </a>

            </div>

        @endforeach

    @endif

@endsection

</body>
</html>