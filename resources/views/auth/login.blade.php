<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        {{-- <h1>Login</h1>

        <form method="POST" action="/login">

            @csrf

            <label>Email</label>
            <input type="email" name="email">

            <br><br>

            <label>Password</label>
            <input type="password" name="password">

            <br><br>

            <button type="submit">Login</button>

        </form>

        <a href="/register">Create an account</a> --}}

        @extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="card" style="max-width: 450px; margin: auto;">

        <h1>Login</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <button type="submit">Login</button>

        </form>

        <p>
            Don't have an account?
            <a href="/register">Register</a>
        </p>

    </div>

@endsection
    </body>
</html>