<?php

namespace App\Models\Banque;

use Illuminate\Database\Eloquent\Model;

class Banque extends Model 
{

    protected $table = 'banques';
    public $timestamps = true;
    protected $fillable = array('libelle', 'montant', 'numero_compte');

    public function caisse()
    {
        return $this->hasOne('App\Models\Caisse', 'banque_id');
    }

}