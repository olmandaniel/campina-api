<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
	protected $guarded = ['id'];
	protected $fillable = [
		'serie',
        'number',
        'date',
        'purchase_order_id',
        'document_type_id',
        'image',
        'exchange_rate',
        'reason',
        'igv',
        'company_id',
        'currency_id',
        'order_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
