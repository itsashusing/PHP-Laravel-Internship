<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Product</title>
</head>

<body>
    <div class="container ">
        <div class="d-flex flex-column align-items-center ">
            <div>
                <h3>Add New Product</h3>
            </div>
            <div>
                <form action="{{ route('addProduct') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label ">Name</label>
                        <input type="text" class="form-control " name="name">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discription</label>
                        <input type="text" class="form-control" name="discription">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>

    </div>
</body>

</html>
