<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;
use App\Models\Dps;
use App\Http\Controllers\DpsController;

class AutoController extends Controller
{
    public function index()
    {
        $dps = new DpsController();
        return view('autos', ['autos' => $this->getAllAutos(), 'dps' => $dps->getAllDps()]);
    }

    public function create()
    {
        $dps_list = Dps::all();
        return view('autos.create', ['dps_list' => $dps_list]);
    }

    public function store(Request $request): RedirectResponse
    {
        $auto = Auto::create([
            'owner_name' => $request->input('owner_name'),
            'brand' => $request->input('brand'),
            'car_number' => $request->input('car_number'),
            'color' => $request->input('color'),
            'dps_id' => $request->input('dps_id'),
        ]);

        return \redirect(route('autos.index'));
    }

    public function edit(Auto $auto)
    {
        $dps_list = Dps::all();
        return view('autos.edit', ['dps_list' => $dps_list, 'auto' => $auto]);
    }

    public function update(Request $request, Auto $auto): RedirectResponse
    {
        $auto->update([
            'owner_name' => $request->input('owner_name'),
            'brand' => $request->input('brand'),
            'car_number' => $request->input('car_number'),
            'color' => $request->input('color'),
            'dps_id' => $request->input('dps_id'),
        ]);
        return \redirect(route('autos.index'));
    }

    public function destroy($id): RedirectResponse
    {
        Auto::destroy($id);
        return \redirect(route('autos.index'));
    }

    public function getAllAutos(){
        return Auto::all();
    }

}
