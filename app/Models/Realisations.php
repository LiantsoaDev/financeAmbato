<?php

namespace App\Models\Realisations;

use Illuminate\Database\Eloquent\Model;

class Realisations extends Model 
{

    protected $table = 'realisations';
    public $timestamps = true;
    protected $fillable = array('libelle', 'date', 'montant', 'budget_id');
    protected $visible = array('libelle', 'date', 'montant', 'budget_id');

    public function budget()
    {
        return $this->belongsTo('App\Models\Budgets');
    }

}