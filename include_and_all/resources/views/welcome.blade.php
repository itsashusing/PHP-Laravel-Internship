<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
@php
    $names = [];
@endphp

<body>
    @include('nav', ['names' => $names])
    @include('pages.footer', ['name' => 'Ashutosh Singh'])

    {{-- @includeIf('pages.check')  if check.blade.php in present so include otherwise it not give any error --}}
    @includeWhen(2 > 3, 'nav')
    {{-- check condition then include --}}
</body>

</html>
