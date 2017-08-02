<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
  protected $fillable=[
    'country',
    'first_name',
    'last_name',
    'zip',
    'state',
    'phone',
    'email',
    'address',
    'city',
    'user_id'

  ];
  

public function user()
{
    return $this->belongsTo('App\User');
}

  
  
}
