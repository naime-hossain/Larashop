<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
    'tax','currency','stripe_key','stripe_secret'
    ];
}
