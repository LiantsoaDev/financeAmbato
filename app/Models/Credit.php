<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model 
{

    protected $table = 'credits';
    public $timestamps = true;
    protected $fillable = array('montant', 'type');
    protected $visible = array('montant', 'type');

    public function mouvement()
    {
        return $this->hasMany('App\Models\Mouvements', 'mouvement_id');
    }

    public function compte()
    {
        return $this->belongsTo('App\Models\Comptes');
    }

}