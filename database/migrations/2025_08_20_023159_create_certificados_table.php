<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_emisora_id')->constrained('empresas');
            $table->foreignId('empresa_receptora_id')->constrained('empresas');
            $table->foreignId('servicio_id')->constrained('servicios');
            $table->foreignId('maquinaria_id')->constrained('maquinarias');
            $table->string('codigo_qr')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificados');
    }
};
