<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Role has many Users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
    	// hasMany(RelatedModel, foreignKeyOnRelatedModel = role_id, localKey = id)
    	return $this->hasMany(User::class);
    }
}
