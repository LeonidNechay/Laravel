<form action="{{ route('products.update', $product) }}" method="post">

    @csrf

    <input type="hidden" name="id" value="{{$product->id}}">
    <label for="name">Name</label>
    <input required name="name" />
    <br />

    <label for="price">Price</label>
    <input required type="number" name="price" value="{{$product->price}}" />
    <br />

    <label for="manufacturer_id">Manufacturer</label>
    <select required name="manufacturer_id">
        <option value="0">- please select manufacturer</option>
        @foreach ($manufacturer_list as $manufacturer_item)
            <option value="{{ $manufacturer_item->id }}">{{ $manufacturer_item->brand }}</option>
        @endforeach

    </select>
    <br/>

    <label for="create_date">Create date</label>
    <input required name="create_date" value="{{$product->create_date}}"/>

    <br />
    <br />

    <button type="submit">Edit</button>
</form>
