<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class TicketDetail extends Model
{
    protected $table = 'ticket_details';
	protected $guarded = ['id'];
	protected $fillable = [
		'quantity',
        'due_date',
        'uom_id',
        'product_id',
        'ticket_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
