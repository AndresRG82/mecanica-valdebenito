<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }
}
