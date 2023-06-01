<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;
use App\Models\Dps;
use App\Http\Controllers\DpsController;
use App\Http\Requests\AutoRequest;
use Illuminate\Support\Facades\Auth;

class AutoController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Auto::class);
    }

    public function index(Request $request)
    {
        $id = $request->query('id');
        $dps = new DpsController();
        if($id){
            return view('autos', ['autos' => $this->getAutosByDps($id), 'dps' => $dps->getAllDps()]);
        }
        else{
            return view('autos', ['autos' => $this->getAllAutos(), 'dps' => $dps->getAllDps()]);
        }
    }

    public function create()
    {
        $dps_list = Dps::all();
        return view('autos.create', ['dps_list' => $dps_list]);
    }

    public function store(AutoRequest $request): RedirectResponse
    {
        $user = Auth::user()->getAuthIdentifier();
        $validated = $request->validated();
        $auto = Auto::create([
            'owner_name' => $validated['owner_name'],
            'brand' => $validated['brand'],
            'car_number' => $validated['car_number'],
            'color' => $validated['color'],
            'dps_id' => $validated['dps_id'],
            'creator_id' => $user
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

    public function getAutosByDps($id){
        return Auto::where('dps_id', $id)->get();
    }

    public function getAllAutos(){
        return Auto::all();
    }

}
