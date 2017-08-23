<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
   /**
    * Fields that can be mass assigned.
    *
    * @var array
    */
   protected $fillable = ['name'];


     /**
    * Size belongs to many Products.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function products()
   {
   
   	return $this->belongsToMany(Product::class);
   }
}
