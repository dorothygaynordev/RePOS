<?php

namespace App\Exports;
use App\Models\reportModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class reportExport implements FromCollection,WithHeadings
{
    protected $reporte;

    public function __construct($reporte)
    {
        $this->reporte = $reporte;
    }

    public function collection()
    {
        return $this->reporte;
    }
    public function headings(): array
    {
        return [
            'Folio',
            'SKU',
            'Tienda',
            'Fecha',
            'Zona',
            'Cantidad',
            'Precio',
            'Descuento',
            'Importe',
            'Vendedor',
            'Forma de Pago',
            'Usuario',
            'Autorizador',
            'Medio de Autorizacion',
            'Tipo de Movimiento',
            
        ];
    }
}
