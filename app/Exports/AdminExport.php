<?php

namespace App\Exports;

use App\Ukm;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;

class AdminExport implements FromView,WithStyles
{

    public function view(): View
    {
        return view('exports.admin-export', [
            'data' => Ukm::limit(10)->get();
        ]);
    }



    public function registerEvents(): array
    {
        $event->sheet->wrapText('A1:AC100');
        $event->sheet->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $event->sheet->setFontFamily('A1:AC100', 'Times New Roman');
        $event->sheet->horizontalAlign('D1:Q2' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $event->sheet->horizontalAlign('E6:X6' , \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $event->sheet->verticalAlign('A1:AC100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $event->sheet->horizontalAlign('A6:X7', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $event->sheet->horizontalAlign('E8:AC100', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); 
        $event->sheet->verticalAlign('E7:X7' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_BOTTOM);
        $event->sheet->verticalAlign('A8:D100' , \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $event->sheet->horizontalAlign('A8:D100', \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT); 
        $event->sheet->textRotation('E7:X7', 90);
    }

    
}
