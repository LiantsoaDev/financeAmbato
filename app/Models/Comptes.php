<?php

namespace App\Models\Comptes;

use Illuminate\Database\Eloquent\Model;

class Comptes extends Model 
{

    protected $table = 'comptes';
    public $timestamps = true;
    protected $fillable = array('compte', 'libelle', 'type');
    protected $visible = array('compte', 'libelle', 'type');

    public function credit()
    {
        return $this->hasMany('App\Models\Credit', 'compte_id');
    }

    public function debit()
    {
        return $this->belongsTo('App\Models\Debit');
    }

    public function budget()
    {
        return $this->belongsTo('App\Models\Budgets');
    }

}