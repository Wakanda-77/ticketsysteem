<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'discription',
        'image',


    ];
    use HasFactory;

    public function getTimeAttribute($value)
    {
        //Abdullllllllll
        return substr($value,0,5);
    }
    protected $casts = [
        'date'=> 'datetime:d-m-Y',
    ];
}


