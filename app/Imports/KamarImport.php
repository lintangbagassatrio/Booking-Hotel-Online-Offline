<?php

namespace App\Imports;

use App\Models\Kamar;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KamarImport implements WithHeadingRow, ToModel{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Kamar([
            'kelas' => $row['kelas'],
            'status' => $row['status'],
            'harga' => $row['harga'],
            'fasilitas' => $row['fasilitas'],
        ]);
    }
}
