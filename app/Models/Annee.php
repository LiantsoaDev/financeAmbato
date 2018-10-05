<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    
    /**
     * The table that are mass assignable.
     *
     * @var array
     */

    protected $table = "annees";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
    	'annees','options','created_at','updated_at'
    ];

    /**
     * A type can have many products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function budget()
    {
    	$this->hasMany('App\Models\Budget');
    }
}
