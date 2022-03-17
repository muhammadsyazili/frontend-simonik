<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MonitoringExport implements FromCollection, WithHeadings, WithCustomStartCell, ShouldAutoSize
{
    private $indicators;
    private $month;

    public function __construct($indicators, $month)
    {
        $this->indicators = $indicators;
        $this->month = $month;
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
        $month = $this->month;

        return [
            'No',
            'Indikator',
            'Tipe',
            'Formula',
            'Satuan',
            'Polaritas',
            'Bobot',
            'Bobot Terhitung',
            "Target s.d $month",
            "Realisasi s.d $month",
            '% Pencapaian',
            'Nilai CAPPING 100',
            'Nilai CAPPING 110',
            'Status',

            'Target Jan',
            'Target Feb',
            'Target Mar',
            'Target Apr',
            'Target May',
            'Target Jun',
            'Target Jul',
            'Target Aug',
            'Target Sep',
            'Target Oct',
            'Target Nov',
            'Target Dec',

            'Realisasi Jan',
            'Realisasi Feb',
            'Realisasi Mar',
            'Realisasi Apr',
            'Realisasi May',
            'Realisasi Jun',
            'Realisasi Jul',
            'Realisasi Aug',
            'Realisasi Sep',
            'Realisasi Oct',
            'Realisasi Nov',
            'Realisasi Dec',
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }
}
