<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entite extends Model 
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'entites';

    /**
    * The Attributes that have timestamps
    *
    * @var array
    */

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('nom', 'type');

    /**
     * The attributes that are visible in mass.
     *
     * @var array
     */

    protected $visible = array('nom', 'type');

     /**
     * A type can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function caisse()
    {
        return $this->hasOne('App\Models\Caisse', 'entite_id');
    }

     /**
     * A type can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

     public function user()
     {
     	return $this->belongsTo('App\Models\User');
     }


}