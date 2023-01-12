<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name',
        'email',
        'kamars_id',
        'kelas',
        'jumlahkamar',
        'jumlahorang',
        'datein',
        'dateout',
    ];
}
