<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['path','photoable_type','photoable_id'];

/**
 * Photo morphs to models in photoable_type.
 *
 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
 */
public function photoable()
{
  // morphTo($name = photoable, $type = photoable_type, $id = photoable_id)
  // requires photoable_type and photoable_id fields on $this->table
  return $this->morphTo();
}
}
