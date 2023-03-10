<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
	protected $guarded = ['id'];
	protected $fillable = [
		'code',
        'date',
        'reason',
        'state',
        'requirement_id',
        'warehouse_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
