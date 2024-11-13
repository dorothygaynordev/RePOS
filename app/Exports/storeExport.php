<?php

namespace App\Exports;
use App\Models\storesModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class storeExport implements FromCollection, WithHeadings
{
   protected $report;

   public function __construct(Collection $report)
   {
    $this->report = $report;

   }
    public function collection()
    {
     return $this->report;
    }
    public function headings(): array
    {
        return [
            'SKU',
            'Ventas',
            'Inventario',
            'Centro',
            'Clave',
        ];
    }
}
