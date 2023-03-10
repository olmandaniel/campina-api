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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('description', 150);
            $table->string('short_description', 100);
            $table->string('sku', 25);
            $table->integer('stock')->unsigned();
            $table->integer('stock_min')->unsigned();
            $table->string('type', 25);
            $table->string('line', 50);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('deleted_by');
            $table->integer('area_id')->unsigned();
            $table->integer('uom_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
