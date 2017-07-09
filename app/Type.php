<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Type belongs to many Products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
    	// belongsTo(RelatedModel, foreignKey = products_id, keyOnRelatedModel = id)
    	return $this->belongsToMany(Products::class);
    }
}
