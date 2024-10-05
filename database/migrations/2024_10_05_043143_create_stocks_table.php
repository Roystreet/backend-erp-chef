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
        Schema::create('stock', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('article_id');
            $table->integer('quantity'); // Quantity of stock available
            $table->unsignedBigInteger('last_updated_by'); // FK to users
            $table->timestamps();
            // Foreign Key
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('last_updated_by')->references('id')->on('users');
            // Indexes
            $table->index('article_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
