<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_active','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * User belongs to Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        // belongsTo(RelatedModel, foreignKey = role_id, keyOnRelatedModel = id)
        return $this->belongsTo(Role::class);


    }

    /**
     * User morphs many photo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function photos()
    {
        // morphMany(MorphedModel, morphableName, type = able_type, relatedKeyName = able_id, localKey = id)
        return $this->morphMany(Photo::class, 'photoable');
    }

/**
 * User has many Addresses.
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */

  // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)

  public function addresses()
  {
      return $this->hasMany('App\Address');
  }


// check if the user is active or not
      public function isactive(){

         if ($this->is_active==1) {
             # code...
            return true;
         }else{
            return false;
         }
      }

      
      // check if the user is admin or not

    public function isadmin(){
           if ($this->role) {
               # code...
              if ($this->role->name=='admin') {
             # code...
            return true;
         }else{
            return false;
         }
           }
           return false;
       
      }

         // check if the user is normal user or not

    public function isuser(){
           if ($this->role) {
               # code...
              if ($this->role->name=='user') {
             # code...
            return true;
         }else{
            return false;
         }
           }
           return false;
       
      }

      /**
       * User has many Orders.
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function orders()
      {
          // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
          return $this->hasMany(Order::class);
      }

      /**
       * User has many Reviews.
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function reviews()
      {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = user_id, localKey = id)
        return $this->hasMany(Review::class);
      }
      

}
