<?php

namespace App\Models;

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
        'name', 'email', 'password','role','status','entite_id'
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
     * Scope a query to only include users of a given $role.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $role
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfRole($query, $role)
    {
        return $query->where('role', $role);
    }
    
    /**
     * Scope a query to only include users of a given $status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    
    /**
     * Scope a query to only include users is active
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsActive($query)
    {
        return $query->where('status', 'active');
    }   
    
    /**
     * Is user active
     *
     * @return Boolean
     */
    public function isActive()
    {
      return ($this->status == 'active');
    }
    
    /**
     * Is user admin
     *
     * @return Boolean
     */
    public function isAdmin()
    {
      return $this->hasRole('admin');
    }
    
    /**
     * A user is admin || AFA || APL || member
     *
     * @return Boolean
     */

    public function hasRole($role)
    {
      return ($this->role == $role);
    }

     /**
     * A type can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

     public function entite()
     {
        return $this->hasOne('App\Models\Entite','entite_id');
     }
    
}
