<?php

namespace App\Models\Entite;

use Illuminate\Database\Eloquent\Model;

class Entite extends Model 
{

    protected $table = 'entites';
    public $timestamps = true;
    protected $fillable = array('nom', 'type');
    protected $visible = array('nom', 'type');

    public function caisse()
    {
        return $this->hasOne('App\Models\Caisse', 'entite_id');
    }

}