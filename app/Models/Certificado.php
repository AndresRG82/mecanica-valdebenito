<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $fillable = [
        'empresa_emisora_id',
        'empresa_receptora_id',
        'servicio_id',
        'maquinaria_id',
        'codigo_qr',
        'fecha_emision',
    ];

    public function empresaEmisora()
    {
        return $this->belongsTo(Empresa::class, 'empresa_emisora_id');
    }

    public function empresaReceptora()
    {
        return $this->belongsTo(Empresa::class, 'empresa_receptora_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function maquinaria()
    {
        return $this->belongsTo(Maquinaria::class);
    }
}
