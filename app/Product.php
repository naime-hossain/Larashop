<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = 
 ['name',
'description',
'price',
'category_id',
'size',
'is_available'];

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
	return $this->belongsToMany(Order::class)-withPivot('qty','total');
}


}
