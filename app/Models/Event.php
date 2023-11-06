<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getTimeAttribute($value)
    {
        //Abdullllllllll
        return substr($value,0,5);
    }
}


