<?php

namespace App\Http\Controllers;

use App\Models\puestoModel;
use App\Models\zonesModel;
use Illuminate\Http\Request;
use App\Models\rolModel;

class puestosController extends Controller
{
    public function index(){

        $puestos = rolModel::get();

        $zonas = zonesModel::get();
        

        // dd($puestos);

        return view('auth/register', compact('puestos','zonas'));

    }
}
