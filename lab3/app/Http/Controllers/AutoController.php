<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;
use App\Models\Dps;
use App\Http\Controllers\DpsController;
use App\Http\Requests\AutoRequest;

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

    public function store(AutoRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $auto = Auto::create([
            'owner_name' => $validated['owner_name'],
            'brand' => $validated['brand'],
            'car_number' => $validated['car_number'],
            'color' => $validated['color'],
            'dps_id' => $validated['dps_id'],
        ]);

        return \redirect(route('autos.index'));
    }

    public function edit(Auto $auto)
    {
        $dps_list = Dps::all();
        return view('autos.edit', ['dps_list' => $dps_list, 'auto' => $auto]);
    }

    public function update(AutoRequest $request, Auto $auto): RedirectResponse
    {
        $validated = $request->validated();
        $auto->update([
            'owner_name' => $validated['owner_name'],
            'brand' => $validated['brand'],
            'car_number' => $validated['car_number'],
            'color' => $validated['color'],
            'dps_id' => $validated['dps_id'],
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
