<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
  protected $fillable = [
	'termsAndConditions',
	'returnPolicy',
	'contactUs',
    ];
}
