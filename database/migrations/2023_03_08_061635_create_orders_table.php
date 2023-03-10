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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 15);
            $table->date('date');
            $table->string('reason', 100);
            $table->string('number_order', 10);
            $table->string('page_condition', 200);
            $table->date('deadline');
            $table->string('delivery_place', 200);
            $table->string('partner_legal_name', 200);
            $table->integer('partner_document_type_id');
            $table->integer('partner_document_number');
            $table->string('partner_address', 500);
            $table->string('contact_legal_name', 200);
            $table->integer('contact_document_type_id');
            $table->string('contact_address', 500);
            $table->string('contact_partner_name', 200);
            $table->string('contact_partner_email', 100);
            $table->integer('contact_partner_phone');
            $table->string('observation');
            $table->string('address_grr', 500);
            $table->string('address_invoice', 500);
            $table->decimal('perception_value', 8, 2);
            $table->decimal('exchange_rates',3,2);
            $table->decimal('total', 8, 2);
            $table->string('state', 25);
            $table->integer('partner_id');
            $table->integer('currency_id');
            $table->integer('area_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
