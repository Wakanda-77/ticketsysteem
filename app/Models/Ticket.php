<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'price',
        'reservations_id',
    ];
    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
