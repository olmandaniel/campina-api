<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->date('date');
            $table->integer('delivery_period');
            $table->string('delivery_condition', 200);
            $table->integer('delivery_days');
            $table->integer('delivery_place');
            $table->integer('delivery_days');
            $table->integer('payment_condition', 200);
            $table->integer('payment_days');
            $table->integer('operation_type_id');
            $table->integer('currency_id');
            $table->integer('bank_id');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
