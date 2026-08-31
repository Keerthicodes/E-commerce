<!DOCTYPE html>
<html>
    <head>
        <title>Category</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        
        <div class="form-container">
        
            <h1>Add Category</h1>
        
            <form action="/categories" method="POST">
                @csrf
        
                <div class="form-group">
                    <label for="name">Category Name</label>
        
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Enter category name"
                        required
                    >
                </div>
        
                <button type="submit">
                    Add Category
                </button>
            </form>
        
        </div>
        
        @endsection
    </body>
</html>
       
