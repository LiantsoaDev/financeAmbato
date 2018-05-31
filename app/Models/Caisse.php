<?php

namespace App\Models\Caisse;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model 
{

    protected $table = 'caisses';
    public $timestamps = true;
    protected $fillable = array('libelle', 'type', 'montant');
    protected $visible = array('libelle', 'type', 'montant');

    public function entite()
    {
        return $this->belongsTo('App\Models\Entite');
    }

    public function banque()
    {
        return $this->belongsTo('App\Models\Caisse');
    }

}