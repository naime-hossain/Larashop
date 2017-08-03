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

  public function addresses()
  {
      return $this->hasMany('App\Address');
  }

      public function isactive(){

         if ($this->is_active==1) {
             # code...
            return true;
         }else{
            return false;
         }
      }

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
      

}
