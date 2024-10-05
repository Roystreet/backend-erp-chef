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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('name')->unique(); // Nombre de la franquicia o tienda
            $table->string('location'); // Ubicación física de la franquicia
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchises');
    }
};
