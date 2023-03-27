<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function index()
    {
        $manufacturer = new ManufacturerController();
        return view('products', ['products' => $this->getAllProducts(), 'manufacturers' => $manufacturer->getAllManufacturers()]);
    }

    public function create()
    {
        $manufacturer_list = Manufacturer::all();
        return view('products.create', ['manufacturer_list' => $manufacturer_list]);
    }

    public function store(Request $request): RedirectResponse
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'create_date' => $request->input('create_date'),
            'manufacturer_id' => $request->input('manufacturer_id'),
        ]);

        return \redirect(route('products.index'));
    }

    public function delete(Product $product)
    {
        return view('products.delete', ['product_id' => $product]);
    }

    public function destroy($id): RedirectResponse
    {
        Product::destroy($id);
        return \redirect(route('products.index'));
    }

    public function getAllProducts(){
        return Product::all();
    }
}

