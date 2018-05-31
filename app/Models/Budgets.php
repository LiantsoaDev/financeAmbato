<?php

namespace App\Models\Budgets;

use Illuminate\Database\Eloquent\Model;

class Budgets extends Model 
{

    protected $table = 'budgets';
    public $timestamps = true;
    protected $fillable = array('libelle', 'montant');
    protected $visible = array('libelle', 'montant');

    public function compte()
    {
        return $this->hasMany('App\Models\Comptes', 'compte_id');
    }

    public function realisation()
    {
        return $this->hasMany('App\Models\Realisations', 'budget_id');
    }

}