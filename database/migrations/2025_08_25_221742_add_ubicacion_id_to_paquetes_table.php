<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('paquetes', function (Blueprint $table) {
        $table->foreignId('ubicacion_id')
              ->nullable()
              ->constrained('ubicaciones')
              ->nullOnDelete();
    });
}

public function down()
{
    Schema::table('paquetes', function (Blueprint $table) {
        $table->dropForeign(['ubicacion_id']);
        $table->dropColumn('ubicacion_id');
    });
}


    /**
     * Reverse the migrations.
     */

};
