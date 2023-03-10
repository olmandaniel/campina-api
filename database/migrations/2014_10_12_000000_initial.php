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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(true);
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('areas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name", 60);
            $table->string("code", 15);
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('measurement_units', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 40);
            $table->string('code', 10);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->string('description', 100)->nullable();
            $table->string('short_description', 50)->nullable();
            $table->string('code');
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('description', 250);
            $table->string('sku', 25);
            $table->smallInteger('stock')->unsigned();
            $table->smallInteger('stock_min')->unsigned();
            $table->string('type', 25);
            $table->string('line', 50);
            $table->uuid('area_id');
            $table->uuid('uom_id');
            $table->uuid('category_id');
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('uom_id')->references('id')->on('measurement_units');
            $table->foreign('category_id')->references('id')->on('product_categories');
        });

        Schema::create('document_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string("name", 100);
            $table->string("code", 8);
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('document_type_id');
            $table->string('document_number',15);
            $table->string('legal_name', 200);
            $table->string('logo', 50);
            $table->boolean('active')->default(true);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('document_type_id')->references('id')->on('document_types')->nullable();
        });

        Schema::create('address_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 25);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('company_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('address', 500);
            $table->integer('number');
            $table->string('reference', 200);
            $table->integer('ubigeo_id');
            $table->uuid('address_type_id');
            $table->uuid('company_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->nullable();
            $table->foreign('address_type_id')->references('id')->on('address_types')->nullable();
        });

        Schema::create('company_phones', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('country_code', 5);
            $table->string('number',14);
            $table->string('brand', 25);
            $table->boolean('is_main')->default(false);
            $table->uuid('company_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->nullable();
        });

        Schema::create('partners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('document_type_id');
            $table->string('document_number', 15);
            $table->string('name', 200);
            $table->string('last_name', 100);
            $table->boolean('is_supplier');
            $table->boolean('is_customer');
            $table->boolean('is_contact');
            $table->string('email', 100);
            $table->uuid('area_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('document_type_id')->references('id')->on('document_types');
        });

        Schema::create('partner_addresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('address', 500);
            $table->integer('number');
            $table->string('reference', 200);
            $table->integer('ubigeo_id');
            $table->boolean('is_main')->default(false);
            $table->uuid('partner_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('partner_id')->references('id')->on('partners');
        });

        Schema::create('partner_phones', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('country_code', 5);
            $table->string('number', 14);
            $table->string('brand', 25);
            $table->boolean('is_main');
            $table->uuid('partner_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('partner_id')->references('id')->on('partners');
        });

        Schema::create('voucher_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('code', 10);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('banks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 50);
            $table->string('code', 10);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 25);
            $table->string('code', 10);
            $table->string('symbol', 10);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('partner_bank_accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('account_number',40);
            $table->string('account_holder', 200);
            $table->uuid('partner_id');
            $table->uuid('bank_id');
            $table->uuid('currency_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('bank_id')->references('id')->on('banks');
            $table->foreign('currency_id')->references('id')->on('currencies');
        });

        Schema::create('containers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 200);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('container_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity');
            $table->string('presentation', 25);
            $table->uuid('container_id');
            $table->uuid('product_id');
            $table->uuid('uom_id');
            $table->timestampsTz();
            $table->foreign('container_id')->references('id')->on('containers');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('uom_id')->references('id')->on('measurement_units');
        });

        Schema::create('operation_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 25);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('requests', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code', 15);
            $table->date('date');
            $table->integer('delivery_period');
            $table->string('delivery_condition', 200);
            $table->integer('delivery_days');
            $table->integer('delivery_place');
            $table->string('payment_condition', 200);
            $table->integer('payment_days');
            $table->uuid('operation_type_id');
            $table->uuid('currency_id');
            $table->uuid('bank_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('operation_type_id')->references('id')->on('operation_types');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('bank_id')->references('id')->on('banks');
        });

        Schema::create('request_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity');
            $table->uuid('product_id');
            $table->uuid('uom_id');
            $table->uuid('request_id');
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('uom_id')->references('id')->on('measurement_units');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('sale_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('image');
            $table->boolean('is_igv');
            $table->boolean('is_selected');
            $table->uuid('request_id');
            $table->uuid('partner_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('request_id')->references('id')->on('requests');
            $table->foreign('partner_id')->references('id')->on('partners');
        });

        Schema::create('sale_order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->uuid('product_id');
            $table->uuid('sale_order_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sale_order_id')->references('id')->on('sale_orders');
        });

        Schema::create('plants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 25);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('warehouses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 25);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type', 15);
            $table->date('date');
            $table->string('reason', 100);
            $table->string('number_order', 10);
            $table->string('page_condition', 200);
            $table->date('deadline');
            $table->string('delivery_place', 200);
            $table->string('partner_legal_name', 200);
            $table->uuid('partner_document_type_id');
            $table->integer('partner_document_number');
            $table->string('partner_address', 500);
            $table->string('contact_legal_name', 200);
            $table->uuid('contact_document_type_id');
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
            $table->uuid('partner_id');
            $table->uuid('currency_id');
            $table->uuid('area_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('partner_document_type_id')->references('id')->on('document_types');
            $table->foreign('contact_document_type_id')->references('id')->on('document_types');
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('area_id')->references('id')->on('areas');
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity');
            $table->uuid('uom_id');
            $table->decimal('subtotal',8 , 2);
            $table->uuid('product_id');
            $table->uuid('order_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('uom_id')->references('id')->on('measurement_units');
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('number');
            $table->date('date');
            $table->string('reason', 200);
            $table->string('state', 25);
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('warehouse_id');
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
        });

        Schema::create('tickets_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('quantity');
            $table->date('due_date');
            $table->uuid('uom_id');
            $table->uuid('product_id');
            $table->uuid('ticket_id');
            $table->foreign('uom_id')->references('id')->on('measurement_units')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->nullable();
            $table->foreign('ticket_id')->references('id')->on('tickets')->nullable();
        });

        Schema::create('requirements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code',15);
            $table->date('date');
            $table->date('diedline');
            $table->uuid('applicant_user_id');
            $table->uuid('managed_user_id');
            $table->string('sate', 25);
            $table->uuid('plant_id');
            $table->uuid('area_id');
            $table->timestampsTz();
            $table->softDeletesTz();
            $table->uuid('created_by');
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->nullable();
            $table->foreign('applicant_user_id')->references('id')->on('users');
            $table->foreign('managed_user_id')->references('id')->on('users');
            $table->foreign('plant_id')->references('id')->on('plants');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
        Schema::dropIfExists('tickets_details');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('sale_order_details');
        Schema::dropIfExists('sale_orders');
        Schema::dropIfExists('request_details');
        Schema::dropIfExists('requests');
        Schema::dropIfExists('operation_types');
        Schema::dropIfExists('container_details');
        Schema::dropIfExists('containers');
        Schema::dropIfExists('partner_bank_accounts');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('banks');
        Schema::dropIfExists('voucher_types');
        Schema::dropIfExists('partner_phones');
        Schema::dropIfExists('partner_addresses');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('company_phones');
        Schema::dropIfExists('company_addresses');
        Schema::dropIfExists('address_types');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('document_types');
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('measurement_units');
        Schema::dropIfExists('areas');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
