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
        Schema::create('container_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->string('presentation', 25);
            $table->integer('container_id');
            $table->integer('product_id');
            $table->integer('uom_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('container_details');
    }
};
