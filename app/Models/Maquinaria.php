<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'chasis',
        'patente',
        'kilometraje',
    ];

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }
}
