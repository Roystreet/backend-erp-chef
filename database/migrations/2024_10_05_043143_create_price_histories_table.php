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
        Schema::create('price_history', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('article_id');
            $table->decimal('old_price', 10, 2);
            $table->decimal('new_price', 10, 2);
            $table->unsignedBigInteger('changed_by'); // FK to users or admin who changed the price
            $table->timestamp('changed_at');
            $table->timestamps();
            // Foreign Key
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('changed_by')->references('id')->on('users');
            // Indexes
            $table->index('article_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('price_history');
    }
};
