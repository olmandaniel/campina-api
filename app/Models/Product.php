<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
	protected $guarded = ['id'];
	protected $fillable = [
        'name',
		'description',
        'short_description',
        'sku',
        'category_id',
        'stock',
        'stock_min',
        'type',
        'line',
        'area_id',
        'uom_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
