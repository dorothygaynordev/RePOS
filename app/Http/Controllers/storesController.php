<?php

namespace App\Http\Controllers;

use App\Models\storesModel;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\reportExport;
use App\Exports\storeExport;

class storesController extends Controller
{
    public function index(Request $request)
    {
        $store = $request->input('store');
        $storef = $request->input('secondInput');
        $isChecked = $request->has('showSecondInput');
        $query = storesModel::query();

        if ($isChecked && $storef) {
            $query->whereBetween('CenterId', [$store, $storef]);
        } else {
            $query->where('CenterId', $store);
        }

        $data = $query->where('Division', '1')->orderBy('Ventas', 'DESC')->get();

        

        return view('detailStore', compact('data'));
    }
    public function exportToExcelStores(Request $request){
        $store = $request->input('store');
        $storef = $request->input('secondInput');
        $isChecked = $request->has('showSecondInput');
        $query = storesModel::query();
        // dd($storef);
        if ($isChecked && $storef) {
           
            $data =  $query->whereBetween('CenterId', [$store, $storef]);

        } else {
            $query->where('CenterId', $store);
            
        }
        
        $data = $query->where('Division', '1')->orderBy('Ventas', 'DESC')->get(['SKU','Ventas','Inventario','Nombre','CenterId']);

       
       
         return Excel::download(new storeExport($data),'reporte_tiendas.xlsx');
    }
}
