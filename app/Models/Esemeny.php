<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esemeny extends Model
{
    /** @use HasFactory<\Database\Factories\EsemenyFactory> */
    use HasFactory;

    protected $primaryKey = 'esemeny_id';

    protected $fillable = [
        'user_id',
        'nev',
        'leiras',
        'hely',
        'kapacitas',
        'ar',
        'foglalastol',
        'foglalasig',
    ];
}
