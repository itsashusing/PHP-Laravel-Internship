<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Products</title>
</head>

<body>
    <div class=" container-sm">
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Discription</th>
                    <th class="text-center" colspan="2" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row"> {{ $key + 1 }} </th>
                        <td>{{ $product->id }}</td>
                        <td scope="row">{{ $product->name }} </td>
                        <td>{{ $product->discriptions }} </td>
                        <td><a class="btn btn-danger btn-sm" href="{{ route('delete', $product->id) }}">Delete</a></td>
                        <td><a class="btn btn-warning btn-sm"
                                href="{{ route('updateProduct', $product->id) }}">Update</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="d-flex justify-content-center">

            <a class="btn btn-primary" href="/addproduct">Add New Product</a>
        </div>
    </div>
</body>

</html>
