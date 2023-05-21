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
    <button class="flex-shrink-0 m-2 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
        <a href="http://laravel-app.loc/dps">DPS</a>
    </button>
    <button class="flex-shrink-0 m-2 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
        <a href="http://laravel-app.loc/autos">Autos</a>
    </button>
    <table class="min-w-full leading-normal">
        <tr>
            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Id</th>
            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">Region</th>
        </tr>
        @foreach ($dps as $dps_)
            <tr>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">{{ $dps_->id }}</td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200"><a href="http://laravel-app.loc/autos?id={{  $dps_->id }}">{{ $dps_->region }}</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>
