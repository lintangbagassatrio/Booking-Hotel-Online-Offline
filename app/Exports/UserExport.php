<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function array(): array
    {
        return User::getDataUsers();
    }
    public function headings(): array
    {
        return[
            'No',
            'Nama',
            'Email',
            'Phone',
            'Address',
            'Password',
        ];
    }
}
