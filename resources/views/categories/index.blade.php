<!DOCTYPE html>
<html>
    <head><title>Category</title></head>
    <body>
        @extends('layouts.app')

        @section('content')

        <h1>Categories</h1>

        <a href="/categories/create">Add Category</a>

        @foreach ($categories as $category)

            <p>
                {{ $category->name }}
            </p>

        @endforeach

        @endsection
    </body>