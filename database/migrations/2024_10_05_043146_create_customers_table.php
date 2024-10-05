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
        Schema::create('customer_types', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // Customer type (Frecuente, Corporativo, Mayorista)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_types');
    }
};
