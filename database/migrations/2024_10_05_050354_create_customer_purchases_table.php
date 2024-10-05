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
        Schema::create('customer_purchases', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('customer_id'); // FK hacia customers
            $table->decimal('total_purchase_amount', 10, 2); // Monto total de la compra
            $table->date('purchase_date'); // Fecha de la compra
            $table->timestamps(); // created_at y updated_at
            // Foreign Key
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');    
            // Index
            $table->index('customer_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_purchases');
    }
};
