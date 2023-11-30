
<style>
    .container {
        margin: 20px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
</style>
<x-app-layout>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <x-slot name="header">
        <h1>Hello.... {{ auth()->user()->name }}</h1>

        <div class="container">
    <h2>Create a New Category</h2> 
        <form method="POST" action="{{ route('updateCategory', $category->id) }}">
            @csrf            
            <label for="category_name">Category Name:</label>
            <input type="text" id="category_name" name="category_name" value="{{$category->category_name }}">
            
            <button type="submit" class = "btn btn-primary">Update</button>
        </form>
</div>

    </x-slot>
</x-app-layout>