<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class RequestDetail extends Model
{
    protected $table = 'request_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'quantity',
        'uom_id',
        'product_id',
        'request_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
