<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerProduct extends Model
{
    protected $table = 'partner_products';
	protected $guarded = ['id'];
	protected $fillable = [
		'partner_id',
        'product_id'
	];
}
