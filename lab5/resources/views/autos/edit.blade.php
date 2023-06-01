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
    <form action="{{ route('autos.update', $auto) }}" method="post">

        {{ method_field('PUT') }}
        @csrf
        <div class="flex flex-col max-w-md p-4 py-8 bg-gray-200 rounded-lg shadow  sm:px-6 md:px-8 lg:px-10">
            <div class="text-red-700">
                @include('errors')
            </div>
            <input type="hidden" name="id" value="{{$auto->id}}">
            <div class="m-2 flex flex-row justify-between">
                <label for="owner_name" class="pt-2">Owner Name</label>
                <input required name="owner_name" value="{{$auto->owner_name}}" class="rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
            </div>
            <div class="m-2 flex flex-row justify-between">
                <label for="brand" class="pt-2">Brand</label>
                <input required name="brand" value="{{$auto->brand}}" class="rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
            </div>
            <div class="m-2 flex flex-row justify-between">
                <label for="car_number" class="pt-2">Car Number</label>
                <input required name="car_number" value="{{$auto->car_number}}" class="rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
            </div>
            <div class="m-2 flex flex-row justify-between">
                <label for="color" class="pt-2">Color</label>
                <input required name="color" value="{{$auto->color}}" class="rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"/>
            </div>
            <div class="m-2 flex flex-row justify-between">
                <label for="dps_id" class="pt-2">DPS</label>
                <select required name="dps_id" class=" rounded-lg border-transparent appearance-none border border-gray-300 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    @foreach ($dps_list as $dps)
                        @if ($dps->id == $auto->dps_id)
                            <option value="{{ $dps->id }}">{{ $dps->region }}</option>
                        @endif
                    @endforeach
                    @foreach ($dps_list as $dps_item)
                        <option value="{{ $dps_item->id }}">{{ $dps_item->region }}</option>
                    @endforeach

                </select>
            </div>
            <button class=" flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">
                Edit
            </button>
        </div>
    </form>
</body>
</html>
