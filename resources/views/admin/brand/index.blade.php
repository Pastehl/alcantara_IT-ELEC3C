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
                <h1>Brands</h1>
            </div>
            <div class="col-auto">
                <a href="{{ route('addBrand') }}" class="btn btn-secondary">Add Brand</a>
            </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Brand Image</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i=1)

                     @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src= "{{ asset($brand->brand_image) }}" alt = "" style="width:70px; height: 40px;"></td>
                            <td>{{ $brand->created_at }}</td>
                            <td><a href="" class="btn btn-secondary">Update</a> 
                            <a href="route('updateBrand', ['id' => $brand->id])" class="btn btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>