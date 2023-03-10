<?php

namespace App\Modules\Partners\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
	protected $guarded = ['id'];
	protected $fillable = [
		'document_type',
        'document_number',
        'name',
        'last_name',
        'is_supplier',
        'is_customer',
        'is_contact',
        'email',
        'area_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
