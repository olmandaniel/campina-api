<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';
	protected $guarded = ['id'];
	protected $fillable = [
        'type',
		'number',
        'date',
        'delivery_period',
        'delivery_condition',
        'delivery_days',
        'delivery_place',
        'payment_condition',
        'payment_days',
        'operation_type',
        'currency_id',
        'bank_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
