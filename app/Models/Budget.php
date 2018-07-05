<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'budgets';

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

    protected $fillable = array('libelle', 'montant');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = array('libelle', 'montant');

    /**
     * A type can have many compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function compte()
    {
        return $this->hasMany('App\Models\Compte', 'compte_id');
    }

    /**
     * A type can have many realisations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function realisation()
    {
        return $this->hasMany('App\Models\Realisation', 'budget_id');
    }

    /**
     * A type can have many annee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function annee()
    {
        return $this->hasOne('App\Models\Annee','annee_id');
    }

}