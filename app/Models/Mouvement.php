<?php

namespace App\Models\Mouvement;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model 
{

    protected $table = 'mouvements';
    public $timestamps = true;
    protected $fillable = array('libelle', 'date');
    protected $visible = array('libelle', 'date');

    public function credit()
    {
        return $this->belongsTo('App\Models\Credit');
    }

    public function debit()
    {
        return $this->belongsTo('App\Models\Debit');
    }

}