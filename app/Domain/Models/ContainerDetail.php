<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class ContainerDetail extends Model
{
    protected $table = 'container_details';
	protected $guarded = ['id'];
	protected $fillable = [
        'quantity',
        'presentation',
		'container_id',
        'uom_id',
        'product_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
