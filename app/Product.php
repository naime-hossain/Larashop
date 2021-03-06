<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{

  use Searchable;


   /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'name';
    }

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = 
 [
    'name',
    'description',
    'price',
    'category_id',
    'size',
    'is_available','inStock','is_feature','slug'
];



/**
 * Product belongs to Category.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category()
{
	// belongsTo(RelatedModel, foreignKey = category_id, keyOnRelatedModel = id)
	return $this->belongsTo(Category::class);
}



/**
 * Product has many types.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function types()
{
	// hasMany(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
	return $this->belongsToMany(Type::class);
}


/**
 * Product morphs many Photo.
 *
 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
 */
public function photos()
{
	// morphMany(MorphedModel, morphableName, type = able_type, relatedKeyName = able_id, localKey = id)
	return $this->morphMany(Photo::class, 'photoable');
}


/**
 * Product belongs to Many Orders.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function orders()
{
	// belongsTo(RelatedModel, foreignKey = orders_id, keyOnRelatedModel = id)
	return $this->belongsToMany(Order::class)-withPivot('qty','total','color','size');
}


/**
 * Product has many Reviews.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function reviews()
{
	// hasMany(RelatedModel, foreignKeyOnRelatedModel = product_id, localKey = id)
	return $this->hasMany(Review::class);
}



  /**
    * Products belongs to many Colors.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function colors()
   {
   
   	return $this->belongsToMany(Color::class);
   }


     /**
    * Products belongs to many sizes.
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function sizes()
   {
   
   	return $this->belongsToMany(Size::class);
   }

}
