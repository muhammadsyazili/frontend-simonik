<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TargetsExport implements FromCollection, WithHeadings, WithDrawings, WithCustomStartCell, ShouldAutoSize
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
        return [
            $this->level,
            $this->unit,
            $this->tahun,
        ];
    }

    public function startCell(): string
    {
        return 'B2';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This PLN logo');
        $drawing->setPath(public_path('/pln-icon.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B1');

        return $drawing;
    }
}
