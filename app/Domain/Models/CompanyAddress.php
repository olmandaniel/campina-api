<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    protected $table = 'company_addresses';
	protected $guarded = ['id'];
	protected $fillable = [
		'description',
        'number',
        'name',
        'reference',
        'ubigeo_id',
        'is_main',
        'company_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
