<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerBankAccount extends Model
{
    protected $table = 'partner_bank_accounts';
	protected $guarded = ['id'];
	protected $fillable = [
		'account_number',
        'account_holder',
        'partner_id',
        'bank_id',
        'currency_id',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
	];
}
