<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class CallbackOrders extends Model
{
    protected $fillable = [
        'phone',
        'name',
    ];
}