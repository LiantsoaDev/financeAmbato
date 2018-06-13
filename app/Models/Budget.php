<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model 
{

    protected $table = 'budgets';
    public $timestamps = true;
    protected $fillable = array('libelle', 'montant');
    protected $visible = array('libelle', 'montant');

    public function compte()
    {
        return $this->hasMany('App\Models\Compte', 'compte_id');
    }

    public function realisation()
    {
        return $this->hasMany('App\Models\Realisation', 'budget_id');
    }

}