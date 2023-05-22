<form action="{{ route('$products.destroy', $product->id) }}" method="post">
    @csrf
    {{ method_field('DELETE') }}

    <button type="submit">Delete?</button>
</form>
