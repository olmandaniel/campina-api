<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $table = 'moves';
	protected $guarded = ['id'];
	protected $fillable = [
		'date',
        'type',
        'concept',
        'quantity',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
