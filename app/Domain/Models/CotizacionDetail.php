<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class CotizacionDetail extends Model
{
    protected $table = 'cotizacion_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'quantity',
        'price',
        'product_id',
        'cotizacion_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
