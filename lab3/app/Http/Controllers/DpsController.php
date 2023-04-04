<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Auto;
use App\Models\Dps;

class DpsController extends Controller
{
    public function getAllDps(){
        return Dps::all();
    }
}
