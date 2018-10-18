<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debit extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'debits';

    /**
     * The timestamps that are mass assignable.
     *
     * @var array
     */

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('montant', 'type');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = array('montant', 'type');

    /**
     * A debit belongs To Mouvement
     * 
     * @return true
     */

    public function mouvement()
    {
        return $this->belongsTo('App\Models\Mouvement', 'mouvement_id');
    } 

}