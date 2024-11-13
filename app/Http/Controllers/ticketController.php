<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ticketController extends Controller
{
    public function showTicket($folio, $tienda )
    {
        // Ruta de la carpeta compartida
        $carpetaCompartida = '\\\\10.1.1.19\\cortescaja\\VARANNI\\Tickets\\2023\\11\\'; 
        //CARPETA COMPARTIDA DE TICKETS, ES NECESARIO RECIBIR EL CENTRO Y CONCATENARLO A LA DIRECCION DE LA CARPETA
        // $carpetaCompartida = '\\\\LRORDRIGUEZ-SIS\\Docs2\\';

        // Ruta completa del archivo en la carpeta compartida
        $ruta = $carpetaCompartida . "{$tienda}\\" . "Folio{$folio}.txt";
        // dd($ruta);
        if (file_exists($ruta)) {
            $contenido = file_get_contents($ruta);
            $contenido = mb_convert_encoding($contenido, 'UTF-8', "ISO-8859-1");
            // dd($contenido);
            return View::make('showTicket', compact('contenido'));
        } else {
            return response()->view('archivo-no-encontrado');
        }
    }
}
