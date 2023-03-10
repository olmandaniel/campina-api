<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';
	protected $guarded = ['id'];
	protected $fillable = [
        'image',
        'is_igv',
        'request_id',
		'partner_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
