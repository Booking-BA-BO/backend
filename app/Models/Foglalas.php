<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foglalas extends Model
{
    /** @use HasFactory<\Database\Factories\FoglalasFactory> */
    use HasFactory;

    protected $primaryKey = 'foglalas_id';

    protected $fillable = [
        'rendezveny_id',
        'teljes_nev',
        'email',
        'telefon',
        'db',
    ];
}
