<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    @yield('resources')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Lab3</title>
</head>
    <body>
        <table class="min-w-full leading-normal">
            <tr>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Id</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Owner name</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Brand</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Car number</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Color</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Region</th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200"></th>
                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200"></th>
            </tr>
            @foreach ($autos as $auto)
                <tr>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $auto->id }}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $auto->owner_name }}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $auto->brand }}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $auto->car_number }}</td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $auto->color }}</td>
                    @foreach ($dps as $dps_)
                        @if ($dps_->id == $auto->dps_id)
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $dps_->region }}</td>
                        @endif
                    @endforeach
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200"><button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"><a href="http://laravel-app.loc/autos/{{ $auto->id }}/edit">Edit</a></button></td>
                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                        <form action="{{ route('autos.destroy', $auto->id) }}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}

                            <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
        <a href="http://laravel-app.loc/autos/create">Create new auto</a>
    </button>
    </body>
</html>
