
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
    <h2>Create a New Brand</h2>
    <form action="{{ route('storeBrand') }}" method="POST" enctype="multipart/form-data">
    @csrf  

        <div class="form-group">
            <label for="brand_name">Category Name</label>
            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter brand name" required>
        </div>
        <div class="form-group">
            <label for="brand_image"></label>
            <input type="file" class="form-control-file" id="brand_image" name="brand_image">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Brand</button>
    </form>
</div>
    </x-slot>
</x-app-layout>