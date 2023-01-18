<?php

namespace App\Exports;

use App\Models\Kamar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KamarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kamar::all();
    }

    public function array(): array
    {
        return Kamar::getDataKamars();
    }
    public function headings(): array
    {
        return[
            'No',
            'Nama',
            'Status',
            'Harga',
            'Fasilitas',
        ];
    }
}
