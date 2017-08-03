<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
    'user_id',
'address_id',
'is_deliver',
'order_token',
    ];


public function products()
{
    return $this->belongsToMany('App\Product')-withPivot('qty','total');
}




}
