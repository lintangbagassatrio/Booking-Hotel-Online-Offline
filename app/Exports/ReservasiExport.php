<?php

namespace App\Exports;

use App\Models\Reservasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ReservasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reservasi::all();
    }

    public function array(): array
    {
        return Reservasi::getDataReservasis();
    }
    public function headings(): array
    {
        return[
            'Res. ID',
            'User ID',
            'Jumlah Kamar',
            'Jumlah Orang',
            'Tanggal Masuk',
            'Tanggal Keluar',
            'Bukti Pembayaran',
        ];
    }
}
