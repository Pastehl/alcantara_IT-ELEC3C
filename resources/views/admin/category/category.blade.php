<style>
    .container {
        margin: 20px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #ffffff;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>

<x-app-layout>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <x-slot name="header">
        <h1>Hello.... {{ auth()->user()->name }}</h1>
        
        <div class="container">
            <div class = "row justify-content-between">
            <div class="col-auto">
                <h1>Categories</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('addCategory') }}" class="btn btn-secondary">Add Category</a>
            </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>ID</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user_id }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td><a href="{{ route('editCategory', ['categoryId' => $category->id]) }}" class="btn btn-secondary">Update</a> 
                            <a href="{{ route('RemoveCat', ['categoryId' => $category->id])  }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class = "row justify-content-between">
            <div class="col-auto">
                <h1>Soft Delete</h1>
            </div>
            <div class="col-auto">
                
            </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Category Name</th>
                        <th>Deleted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trashes as $trash)
                        <tr>
                            <td>{{ $trash->id }}</td>
                            <td>{{ $trash->user_id }}</td>
                            <td>{{ $trash->category_name }}</td>
                            <td>{{ $trash->deleted_at }}</td>
                            <td><a href="{{ route('RestoreCat', ['categoryId' => $trash->id]) }}" class="btn btn-secondary">Restore</a> 
                            <a href="{{ route('DeleteCat', ['categoryId' => $trash->id]) }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>