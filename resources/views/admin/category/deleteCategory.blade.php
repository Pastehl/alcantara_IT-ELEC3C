
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
    <form action="{{ route('deleteCategory') }}" method="POST">
    @csrf  

        <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
        </div>

        <button type="submit" class="btn btn-primary">Delete Category</button>
    </form>
</div>
    </x-slot>
</x-app-layout>