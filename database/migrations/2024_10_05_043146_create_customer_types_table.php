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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->string('dni')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('customer_type_id'); // FK to customer types
            $table->timestamps();
            // Foreign Key
            //$table->foreign('customer_type_id')->references('id')->on('customer_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
