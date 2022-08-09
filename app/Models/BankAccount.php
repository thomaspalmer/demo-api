<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory, BelongsToUser;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_on_account', 'account_number', 'sort_code', 'card_number', 'card_expiry', 'card_cvc',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'account_number' => 'encrypted',
        'sort_code' => 'encrypted',
        'card_number' => 'encrypted',
        'card_expiry' => 'encrypted',
        'card_cvc' => 'encrypted',
    ];
}
