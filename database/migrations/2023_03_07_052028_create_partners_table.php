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
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_type_id');
            $table->integer('document_number');
            $table->string('name', 200);
            $table->string('last_name', 100);
            $table->boolean('is_supplier');
            $table->boolean('is_customer');
            $table->boolean('is_contact');
            $table->string('email', 100);
            $table->integer('area_id');
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
        Schema::dropIfExists('partners');
    }
};
