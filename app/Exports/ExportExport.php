<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize
{
    private $indicators;

    public function __construct($indicators)
    {
        $this->indicators = $indicators;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return new Collection($this->indicators);
    }

    public function headings(): array
    {
        return [
            'KPI',
            'Tipe',
            'Formula',
            'Satuan',
            'Polaritas',
            'Target - Jan',
            'Target - Feb',
            'Target - Mar',
            'Target - Apr',
            'Target - May',
            'Target - Jun',
            'Target - Jul',
            'Target - Aug',
            'Target - Sep',
            'Target - Oct',
            'Target - Nov',
            'Target - Dec',
            'Realisasi - Jan',
            'Realisasi - Feb',
            'Realisasi - Mar',
            'Realisasi - Apr',
            'Realisasi - May',
            'Realisasi - Jun',
            'Realisasi - Jul',
            'Realisasi - Aug',
            'Realisasi - Sep',
            'Realisasi - Oct',
            'Realisasi - Nov',
            'Realisasi - Dec',
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }
}
