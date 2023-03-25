<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Lab2</title>
</head>
    <body>
        <table>
            <tr>
                <th>Id</th>
                <th>Owner name</th>
                <th>Brand</th>
                <th>Car number</th>
                <th>Color</th>
                <th>Region</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($autos as $auto)
                <tr>
                    <td>{{ $auto->id }}</td>
                    <td>{{ $auto->owner_name }}</td>
                    <td>{{ $auto->brand }}</td>
                    <td>{{ $auto->car_number }}</td>
                    <td>{{ $auto->color }}</td>
                    @foreach ($dps as $dps_)
                        @if ($dps_->id == $auto->dps_id)
                            <td>{{ $dps_->region }}</td>
                        @endif
                    @endforeach
                    <td><button><a href="http://laravel-app.loc/autos/{{ $auto->id }}/edit">Edit</a></button></td>
                    <td>
                        <form action="{{ route('autos.destroy', $auto->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    <button>
        <a href="http://laravel-app.loc/autos/create">Create new auto</a>
    </button>
    </body>
</html>
