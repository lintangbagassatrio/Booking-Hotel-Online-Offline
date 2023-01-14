<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    public function relationToUser()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function relationToKamar()
    {
        return $this->belongsTo(Kamar::class, 'kamars_id');
    }

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
