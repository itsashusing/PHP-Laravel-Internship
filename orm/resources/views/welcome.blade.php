<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="center">
            <div class="innerdiv">
                <h1>User Data:</h1>
                <form action="{{ route('importuser') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit">Import</button>
                </form>
                <a href="{{ route('exportuser') }}">Export</a>
            </div>
        </div>
    </div>
</body>

</html>
