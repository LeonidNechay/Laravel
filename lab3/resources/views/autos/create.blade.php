<form action="{{ route('autos.store') }}" method="post">

    @csrf

    <label for="owner_name">Owner Name</label>
    <input required name="owner_name" />
    <br />

    <label for="brand">Brand</label>
    <input required name="brand" />
    <br />

    <label for="car_number">Car Number</label>
    <input required name="car_number" />
    <br />

    <label for="color">Color</label>
    <input required name="color" />
    <br />

    <label for="dps_id">DPS</label>
    <select required name="dps_id">
        <option value="0">- please select DPS</option>
        @foreach ($dps_list as $dps_item)
            <option value="{{ $dps_item->id }}">{{ $dps_item->region }}</option>
        @endforeach

    </select>
    <br />
    <br />

    <button type="submit">Create</button>
</form>
