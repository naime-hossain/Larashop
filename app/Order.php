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
'total',
    ];


/**
 * Order belongs to many Products.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function products()
{
	
	 return $this->belongsToMany('App\Product')->withPivot('qty','total');
}

/**
 * Order belongs to User.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
	return $this->belongsTo(User::class);
}

/**
 * Order belongs to Address.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function address()
{
	// belongsTo(RelatedModel, foreignKey = address_id, keyOnRelatedModel = id)
	return $this->belongsTo(Address::class);
}





}
