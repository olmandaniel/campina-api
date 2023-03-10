<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $table = 'requirements';
	protected $guarded = ['id'];
	protected $fillable = [
        'id',
        'serie',
        'number',
        'date',
        'diedline',
        'plant',
        'applicant',
        'managed',
        'state',
        'area_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
