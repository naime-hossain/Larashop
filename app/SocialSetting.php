<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialSetting extends Model
{
   /**
    * Fields that can be mass assigned.
    *
    * @var array
    */
   
   protected $fillable = [
'facebook',
'twitter',
'linkedin',
'googlePlus',
'instagram',
'tumblr',
'whatsApp',
   ];
}
