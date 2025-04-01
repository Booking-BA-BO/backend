<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendez extends Model
{
    /** @use HasFactory<\Database\Factories\RendezFactory> */
    use HasFactory;
    
    protected $primaryKey = 'rendezveny_id';

    protected $fillable = [
        'esemeny_id',
        'datum',
        'nyitva',
    ];

    public function foglalasok()
    {
        return $this->hasMany(Foglalas::class, 'rendezveny_id');
    }
}
