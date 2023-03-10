<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
	protected $guarded = ['id'];
	protected $fillable = [
		'date',
        'number',
        'origin_account',
        'destination_account',
        'voucher_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
