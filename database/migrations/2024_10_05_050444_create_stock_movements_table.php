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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('article_id'); // FK hacia articles
            $table->integer('quantity'); // Cantidad movida
            $table->unsignedBigInteger('responsible_user_id'); // FK hacia users
            $table->timestamps(); // created_at y updated_at
            // Foreign Keys
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('responsible_user_id')->references('id')->on('users')->onDelete('cascade');

            // Índices
            $table->index(['article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stock_movements');
    }
};
