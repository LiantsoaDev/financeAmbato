<?php

namespace App\Models\Debit;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model 
{

    protected $table = 'debits';
    public $timestamps = true;
    protected $fillable = array('montant', 'type');
    protected $visible = array('montant', 'type');

    public function debit()
    {
        return $this->hasMany('App\Models\Mouvement', 'mouvement_id');
    }

    public function compte()
    {
        return $this->hasMany('App\Models\Compte', 'compte_id');
    }

}