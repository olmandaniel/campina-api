<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
	protected $guarded = ['id'];
	protected $fillable = [
		'description',
        'code',
        'symbol',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
