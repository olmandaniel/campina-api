<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPhone extends Model
{
    protected $table = 'company_phones';
	protected $guarded = ['id'];
	protected $fillable = [
        'number',
        'brand',
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
