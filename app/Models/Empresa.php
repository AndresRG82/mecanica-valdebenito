<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'email',
        'tipo',
    ];

    public function certificadosEmitidos()
    {
        return $this->hasMany(Certificado::class, 'empresa_emisora_id');
    }

    public function certificadosRecibidos()
    {
        return $this->hasMany(Certificado::class, 'empresa_receptora_id');
    }
}
