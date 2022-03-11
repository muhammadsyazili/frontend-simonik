<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TargetsExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize
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
            'ID (jangan diubah)',
            'KPI',
            'Satuan',
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
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }
}
