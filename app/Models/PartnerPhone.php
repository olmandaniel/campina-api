<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerPhone extends Model
{
    protected $table = 'partner_phones';
	protected $guarded = ['id'];
	protected $fillable = [
        'number',
        'brand',
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
