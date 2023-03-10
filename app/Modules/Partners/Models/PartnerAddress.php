<?php

namespace App\Modules\Partners\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerAddress extends Model
{
    protected $table = 'partner_addresses';
	protected $guarded = ['id'];
	protected $fillable = [
		'description',
        'number',
        'name',
        'reference',
        'ubigeo_id',
        'is_main',
        'partner_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
