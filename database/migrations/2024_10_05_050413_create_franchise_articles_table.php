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
        Schema::create('franchise_articles', function (Blueprint $table) {
            $table->unsignedBigInteger('franchise_id'); // FK hacia franchises
            $table->unsignedBigInteger('article_id'); // FK hacia articles
            $table->integer('stock_quantity'); // Cantidad en stock del artículo en la franquicia
            $table->timestamps(); // created_at y updated_at

            // Foreign Keys
            $table->foreign('franchise_id')->references('id')->on('franchises')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            // Índices
            $table->index(['franchise_id', 'article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('franchise_articles');
    }
};
