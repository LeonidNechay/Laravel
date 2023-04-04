<form action="{{ route('autos.update', $auto) }}" method="post">

    {{ method_field('PUT') }}
    @csrf

    <input type="hidden" name="id" value="{{$auto->id}}">

    <label for="owner_name">Owner Name</label>
    <input required name="owner_name" value="{{$auto->owner_name}}"/>
    <br />

    <label for="brand">Brand</label>
    <input required name="brand" value="{{$auto->brand}}"/>
    <br />

    <label for="car_number">Car Number</label>
    <input required name="car_number" value="{{$auto->car_number}}"/>
    <br />

    <label for="color">Color</label>
    <input required name="color" value="{{$auto->color}}"/>
    <br />

    <label for="dps_id">DPS</label>
    <select required name="dps_id">
        @foreach ($dps_list as $dps)
            @if ($dps->id == $auto->dps_id)
                <option value="{{ $dps->id }}">{{ $dps->region }}</option>
            @endif
        @endforeach
        @foreach ($dps_list as $dps_item)
            <option value="{{ $dps_item->id }}">{{ $dps_item->region }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Edit</button>
</form>
