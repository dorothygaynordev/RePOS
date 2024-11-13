<?php

namespace App\Http\Controllers;

use App\Models\centerStockModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class centerStockController extends Controller
{


    public function index(Request $request)
    {

        $store = $request->input('clave');
        $description = $request->input('desc');
        $group = $request->input('grupo');
        // $storeNumber = (int)substr($store, 1); 

        // Consulta los datos desde la base de datos SQL Server
        $centerSales = centerStockModel::where('CenterId', $store)
            ->orderBy('Ventas', 'desc')
            ->get();


        // Muestra los datos obtenidos
        // dd($centerStock);
        // dd($group);
        return view('inventoryDetail', compact('store', 'description', 'group', 'centerSales'));
    }
}
