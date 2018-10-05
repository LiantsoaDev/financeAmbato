<?php

namespace App\Models\Realisations;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model 
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'realisations';

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

    protected $fillable = array('libelle', 'date', 'montant', 'budget_id');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */
    
    protected $visible = array('libelle', 'date', 'montant', 'budget_id');

    

}