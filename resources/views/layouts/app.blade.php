<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'My Store')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }

        nav {
            background: #222;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        button {
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            background: #222;
            color: white;
        }

        button:hover {
            opacity: 0.85;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .error {
            color: #c00;
            margin-top: 5px;
        }

        .success {
            color: green;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .product-detail {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 60px;
        }

        .product-info {
            flex: 1;
        }

        .product-image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-image {
            width: 100%;
            max-width: 400px;
            height: auto;
            object-fit: contain;
        }
    </style>
</head>

<body>

<nav>

    <div>
        <a href="/products" class="brand">My Store</a>
    </div>

    <div>

        {{-- @auth
    
            <a href="/products">Products</a>
            @if(auth()->user()->role !== 'seller')
            <a href="/cart">Cart</a>
            <a href="/orders">My Orders</a>
            @endif
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
    
        @else
    
            <a href="/login">Login</a>
            <a href="/register">Register</a>
    
        @endauth
         --}}
         @auth

         @if(auth()->user()->role === 'seller')
             <a href="/seller/products">My Products</a>
         @endif
        
         @if(auth()->user()->role === "customer")
         <a href="/products">Products</a>
         <a href="/cart">Cart</a>
         <a href="/orders">My Orders</a>
         @endif
     
         <form method="POST" action="/logout" style="display:inline;">
             @csrf
             <button type="submit">Logout</button>
         </form>
     
     @endauth

    </div>

</nav>

<div class="container">

    @yield('content')

</div>

</body>
</html>