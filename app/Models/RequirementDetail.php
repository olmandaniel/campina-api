<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequirementDetail extends Model
{
    protected $table = 'requirement_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'requested_quantity',
        'delivered_quantity_1',
        'delivered_quantity_2',
        'delivered_quantity_3',
        'observation',
        'requirement_id',
        'product_id',
        'uom_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
