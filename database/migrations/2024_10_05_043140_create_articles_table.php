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
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->unsignedBigInteger('unit_id'); // FK to units
            $table->timestamps();
            // Foreign Keys
            //$table->foreign('category_id')->references('id')->on('categories');
           // $table->foreign('subcategory_id')->references('id')->on('categories');
           // $table->foreign('unit_id')->references('id')->on('units');

            // Indexes
            $table->index(['category_id', 'subcategory_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
