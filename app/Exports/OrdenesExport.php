<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class OrdenesExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    protected $secuencial;

    public function __construct($secuencial)
    {
        $this->secuencial = $secuencial;
    }

    public function collection()
    {
        // Ejecutar la consulta SQL para obtener los datos requeridos para el secuencial seleccionado
        $ordenes = DB::select("
            SELECT o.especial, o.codigo, o.valor, e.est_cedula
            FROM ordenes_generadas o
            JOIN estudiantes e ON o.mat_id = e.id
            WHERE o.especial = :secuencial
        ", ['secuencial' => $this->secuencial]);

        // Transformar los datos según tus requerimientos
        $ordenes = collect($ordenes)->map(function ($orden, $index) {
            return [
                $index + 1,              // Contador
                'CO',                   // Valor fijo 'CO'
                $orden->est_cedula,     // Cédula del estudiante
                'USD',                  // Valor fijo 'USD'
                $orden->valor,          // Valor a pagar
                'REC',                  // Valor fijo 'REC'
                $orden->codigo,         // Código de la orden generada
                'N',                    // Valor fijo 'N'
                $orden->especial,       // Especial
            ];
        });

        // Agregar encabezados a la colección
        $ordenes->prepend($this->headings());

        return $ordenes;
    }

    public function headings(): array
    {
        // Definir los encabezados del archivo Excel
        return [
            '#',
            'CO',
            'Cédula del Estudiante',
            'USD',
            'Valor a Pagar',
            'REC',
            'Código',
            'N',
            'Secuencial',           
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
    
                // Agregar el encabezado con el nombre de la unidad educativa centrado
                $sheet->mergeCells('A1:I1'); // Se ajusta a 9 columnas para incluir el nuevo encabezado
                $sheet->setCellValue('A1', 'Unidad Educativa Técnica Vida Nueva');
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A1')->getFont()->setSize(16);
    
                // Agregar la imagen al lado derecho del encabezado
                $drawing = new Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('img/vn.png')); // Ruta a tu logo
                $drawing->setHeight(50);
                $drawing->setCoordinates('J1'); // Posición de la imagen (Columna J)
                $drawing->setOffsetX(10); // Ajuste de la posición en el eje X
                $drawing->setWorksheet($sheet->getDelegate());
    
                // Agregar una tabla para los datos
                $sheet->setAutoFilter('A2:I2'); // Se ajusta a 9 columnas
    
                // Agregar los encabezados en la fila 2 y centrarlos
                $sheet->setCellValue('A2', '#');
                $sheet->setCellValue('B2', 'CO');
                $sheet->setCellValue('C2', 'Cédula del Estudiante');
                $sheet->setCellValue('D2', 'USD');
                $sheet->setCellValue('E2', 'Valor a Pagar');
                $sheet->setCellValue('F2', 'REC');
                $sheet->setCellValue('G2', 'Código');
                $sheet->setCellValue('H2', 'N');
                $sheet->setCellValue('I2', 'Secuencial');
    
                $sheet->getStyle('A2:J2')->getAlignment()->setHorizontal('center');
    
                // Definir el formato de celda como texto para la columna de cédula desde la fila 3
                $sheet->getStyle('C3:C' . $sheet->getHighestRow())->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    
                // Establecer bordes a todas las celdas
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ];
                $sheet->getStyle('A2:I' . $sheet->getHighestRow())->applyFromArray($styleArray);
    
                // Establecer configuraciones de impresión
                $sheet->getDelegate()->getPageSetup()->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
                $sheet->getDelegate()->getPageSetup()->setFitToWidth(1);
                $sheet->getDelegate()->getPageSetup()->setFitToHeight(0);
            },
        ];
    }
    
}
