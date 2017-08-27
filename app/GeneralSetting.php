<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = [
     'site_name',
'logo',
'cover_pic',
'site_title',
'site_slogan',

    ];
}
