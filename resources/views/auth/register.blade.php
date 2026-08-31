<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        {{-- <h1>Register</h1>

        <form method="POST" action="/register">

            @csrf

            <label>Name</label>
            <input type="text" name="name">

            <br><br>

            <label>Email</label>
            <input type="email" name="email">

            <br><br>

            <label>Password</label>
            <input type="password" name="password">

            <br><br>

            <button type="submit">Register</button>

        </form>

        <a href="/login">Already have an account? Login</a> --}}

        @extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="card" style="max-width: 450px; margin: auto;">

        <h1>Create Account</h1>

        @if($errors->any())
            <div class="error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/register">

            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name=role id=role required>
                    <option value="">Please Select an option</option>
                    <option value="user">User</option>
                    <option value="seller">Seller</option>
                </select>
            </div>

            <button type="submit">Create Account</button>

        </form>

        <p>
            Already have an account?
            <a href="/login">Login</a>
        </p>

    </div>

@endsection
    </body>
</html>