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
        Schema::create('supplier_orders', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('article_id');
            $table->integer('order_quantity');
            $table->date('order_date');
            $table->enum('payment_status', ['PENDIENTE', 'PAGADO'])->default('PENDIENTE');
            $table->date('delivery_date')->nullable();
            $table->date('payment_due_date')->nullable();
            $table->text('observations')->nullable();
            $table->timestamps();
            // Foreign Keys
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('article_id')->references('id')->on('articles');
            // Indexes
            $table->index(['supplier_id', 'article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier_orders');
    }
};
