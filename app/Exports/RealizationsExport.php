<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RealizationsExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    private $level;
    private $unit;
    private $tahun;
    private $indicators;

    public function __construct($level, $unit, $tahun, $indicators)
    {
        $this->level = $level;
        $this->unit = $unit;
        $this->tahun = $tahun;
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
        $level = $this->level;
        $unit = $this->unit;
        $tahun = $this->tahun;

        return [
            'ID (jangan diubah)',
            'Indikator',
            'Satuan',
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
}
