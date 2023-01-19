<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
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
    public function relationToReservasi()
    {
        return $this->belongsTo(Reservasi::class, 'reservasis_id');
    }
}
