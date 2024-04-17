<?php

namespace App\Exports;

use App\Models\GeneraOrdenes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdenesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Obtener los datos de las órdenes
        $ordenes = GeneraOrdenes::all();

        // Transformar los datos según tus requerimientos
        $ordenes->transform(function ($orden) {
            return [
                'CO', // Valor fijo 'CO'
                $orden->estudiante->est_cedula, // Cédula del estudiante
                'USD', // Valor fijo 'USD'
                $orden->valor_a_pagar, // Valor a pagar
                'REC', // Valor fijo 'REC'
                $orden->codigo, // Código de la orden generada
                'N' // Valor fijo 'N'
            ];
        });

        return $ordenes;
    }

    public function headings(): array
    {
        // Definir los encabezados del archivo Excel
        return [
            'CO',
            'Cédula del Estudiante',
            'USD',
            'Valor a Pagar',
            'REC',
            'Código',
            'N'
        ];
    }
}