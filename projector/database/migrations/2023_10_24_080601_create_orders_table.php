<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->string('inventory_manager_id');
            $table->string('order_date');
            $table->string('order_number');
            $table->string('order_status')->nullable(); 
            $table->string('delivery_date');
            $table->string('medical_drug_id');  
            $table->string('total_products');
            $table->string('invoice_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
