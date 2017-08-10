<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   /**
    * Fields that can be mass assigned.
    *
    * @var array
    */
   protected $fillable = ['rating','review','product_id','user_id'];

   /**
    * Review belongs to Product.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function product()
   {
   	// belongsTo(RelatedModel, foreignKey = product_id, keyOnRelatedModel = id)
   	return $this->belongsTo(Product::class);
   }

   /**
    * Review belongs to User.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
   	// belongsTo(RelatedModel, foreignKey = user_id, keyOnRelatedModel = id)
   	return $this->belongsTo(User::class);
   }

   
}
