<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model 
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'credits';

    /**
     * The timestamps that are mass assignable.
     *
     * @var array
     */

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('type','montant');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = array('type','montant');

    /**
     * A Credit can have many mouvement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function mouvement()
    {
        return $this->hasMany('App\Models\Mouvement', 'mouvement_id');
    }

    /**
     * A Credit can belongs to compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function compte()
    {
        return $this->belongsTo('App\Models\Compte');
    }

}