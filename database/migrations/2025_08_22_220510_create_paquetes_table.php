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
    Schema::create('paquetes', function (Blueprint $table) {
        $table->id();
        $table->string('tracking')->unique();
        $table->string('nombre_cliente');
        $table->string('telefono_cliente');
        $table->string('nombre_vendedor');
        $table->string('telefono_vendedor');
        $table->string('tipo_paquete');
        $table->decimal('costo_envio', 10, 2);
        $table->decimal('costo_total', 10, 2)->nullable();
        $table->boolean('espera_remuneracion');
        $table->boolean('urgente');
        $table->string('destino');
        $table->date('fecha_recepcion');
        $table->string('estatus');
        $table->text('comentario')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paquetes');
    }
};
