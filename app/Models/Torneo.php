<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'genero', 'ganador_id'];

    public function ganador()
    {
        return $this->belongsTo(Jugador::class, 'ganador_id');
    }
}