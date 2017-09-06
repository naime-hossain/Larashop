<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
  
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
  

/**
 * Address belongs to User.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
    // belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
    return $this->belongsTo(User::class);
}


  
  
}
