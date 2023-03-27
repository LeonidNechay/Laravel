<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>MKR1</title>
</head>
<body>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Manufacturer</th>
        <th>Create date</th>
        <th></th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            @foreach ($manufacturers as $manufacturer)
                @if ($manufacturer->id == $product->manufacturer_id)
                    <td>{{ $manufacturer->brand }}</td>
                @endif
            @endforeach
            <td>{{ $product->create_date }}</td>

            <td>
                <button><a href="http://laravel-app.loc/products/{{ $product->id }}">Delete</a></button>
            </td>
        </tr>
    @endforeach
</table>
<button>
    <a href="http://laravel-app.loc/products/create">Create new product</a>
</button>
</body>
</html>
