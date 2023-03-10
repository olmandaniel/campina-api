<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'quantity',
        'price_unit',
        'subtotal',
        'uom_id',
        'product_id',
        'order_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
