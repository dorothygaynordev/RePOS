<?php

namespace App\Http\Controllers;

use App\Models\reportModel;
use Illuminate\Http\Request;
use App\Exports\reportExport;
use App\Models\zonesModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class reportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $puestoUsuario = $user->puesto;
        $zonaUsuario = $user->zona; // Suponiendo que el campo se llama 'zona' en tu modelo de usuario


        //  dd($zonaUsuario);

        $zona = $request->input('zona');
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $centros = $request->input('centros');
        $reporte = $request->input('report');


        // dd($zona);
        $reportes = reportModel::query();
        $fechaInicioDefault = now()->subDays(3)->format('Y-m-d');

        // Filtro de fecha
        // Filtro de fecha
        if (empty($fechaInicio) || empty($fechaFin)) {
            $reportes->whereBetween('Fecha', [$fechaInicioDefault, now()->format('Y-m-d')]);
        } else {
            $reportes->whereBetween('Fecha', [$fechaInicio, $fechaFin]);
        }


        // filtro de zonas por usuario
        if ($puestoUsuario == 1 || $puestoUsuario == 14) {
            if (!empty($zona)) {
                $reportes->where('Zona', $zona);
            }
        } else {
            if ($zonaUsuario == 1) {
                $zona = 'Grupo 1';
            } elseif ($zonaUsuario == 2) {
                $zona = 'Grupo 2';
            } elseif ($zonaUsuario == 3) {
                $zona = 'Grupo 3';
            }
            $reportes->where('Zona', $zona);
        }
        // Filtro de tipo de movimiento
        if (!empty($reporte)) {
            $reportes->where('Tipo_mov', $reporte);
        }
        //Filtro de fecha
        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $reportes->whereBetween('Fecha', [$fechaInicio, $fechaFin]);
        }
        if (!empty($centros)) {
            $reportes->where('Tienda', $centros);
        }


        $reportes = $reportes->get();

        $zonas = zonesModel::get();
        $zonaUsuarioObj = $zonas->where('id', $zonaUsuario)->first();

        //  dd($zonaUsuarioObj);

        // dd($reportes);
        return view('dashboard', compact('reportes', 'zonas', 'zonaUsuarioObj'));
    }

    public function exportToExcelStores(Request $request)
    {
        $user = Auth::user();
        $puestoUsuario = $user->puesto;
        $zonaUsuario = $user->zona;

        $zona = $request->input('zona');
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $reporte = $request->input('report');

        $reportes = reportModel::query();

        if ($puestoUsuario == 1 || $puestoUsuario == 14) {
            if (!empty($zona)) {
                $reportes->where('Zona', $zona);
            }
        } else {
            if ($zonaUsuario == 1) {
                $zona = 'Grupo 1';
            } elseif ($zonaUsuario == 2) {
                $zona = 'Grupo 2';
            } elseif ($zonaUsuario == 3) {
                $zona = 'Grupo 3';
            }
            $reportes->where('Zona', $zona);
        }

        if (!empty($fechaInicio) && !empty($fechaFin)) {
            $reportes->whereBetween('Fecha', [$fechaInicio, $fechaFin]);
        }

        if (!empty($reporte)) {
            $reportes->where('Tipo_mov', $reporte);
        }

        $reportes = $reportes->get();

        return Excel::download(new ReportExport($reportes), 'reporte.xlsx');
    }
}
