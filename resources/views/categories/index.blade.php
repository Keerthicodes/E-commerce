<!DOCTYPE html>
<html>
    <head><title>Category</title></head>
    <body>
        @extends('layouts.app')

        @section('content')

        <h1>Categories</h1>

        <a href="/categories/create"><button>Add Category</button></a>

        @foreach ($categories as $category)

            <p>
                {{ $category->name }}
            </p>

        @endforeach
            <a href="/seller/products"><button>back</button></a>
        @endsection
    </body>