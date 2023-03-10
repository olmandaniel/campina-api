<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class CasbinRule extends Model
{
    protected $table = 'casbin_rules';
	protected $guarded = ['id'];
	protected $fillable = [
		'ptype',
        'v0',
        'v1',
        'v2',
        'v3',
        'v4',
        'v5',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
