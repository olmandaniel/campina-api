<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
	protected $guarded = ['id'];
	protected $fillable = [
		'type',
        'date',
        'reason',
        'number_order_purchase',
        'page_condition',
        'deadline',
        'delivery_place',
        'partner_legal_name',
        'partner_document_type_id',
        'partner_document_number',
        'partner_address',
        'contact_legal_name',
        'contact_document_type_id',
        'contact_address',
        'contact_partner_name',
        'contact_partner_email',
        'contact_partner_phone',
        'observation',
        'address_grr',
        'address_invoice',
        'perception_value',
        'total',
        'state',
        'partner_id',
        'currency_id',
        'area_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
