<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherDetail extends Model
{
    protected $table = 'voucher_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'quantity',
        'price',
        'importe',
        'product_id',
        'voucher_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
