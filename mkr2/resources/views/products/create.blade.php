<form action="{{ route('products.store') }}" method="post">

    @csrf

    <label for="name">Name</label>
    <input required name="name" />
    <br />

    <label for="price">Price</label>
    <input required type="number" name="price" />
    <br />

    <label for="dps_id">DPS</label>
    <select required name="dps_id">
        <option value="0">- please select manufacturer</option>
        @foreach ($manufacturer_list as $manufacturer_item)
            <option value="{{ $manufacturer_item->id }}">{{ $manufacturer_item->brand }}</option>
        @endforeach

    </select>
    <br/>

    <label for="create_date">Create date</label>
    <input required name="create_date" />

    <br />
    <br />

    <button type="submit">Create</button>
</form>
