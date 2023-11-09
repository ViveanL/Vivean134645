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
        Schema::create('drugs_served', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->date('order_date');
            $table->string('status');
            $table->unsignedBigInteger('pharmacist_id');
            $table->unsignedBigInteger('prescription_id');
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
        Schema::dropIfExists('drugs_served');
    }
};
