<?php

namespace App\Imports;

use App\Models\Reservasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReservasiImport implements WithHeadingRow, ToModel{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Reservasi([
            'users_id' => $row['users_id'],
            'kamars_id' => $row['kamars_id'],
            'jumlahkamar' => $row['jumlahkamar'],
            'jumlahorang' => $row['jumlahorang'],
            'datein' => $row['datein'],
            'dateout' => $row['dateout'],
        ]);
    }
}
