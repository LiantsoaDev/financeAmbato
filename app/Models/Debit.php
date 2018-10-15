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
     * A Debit can have many debit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function debit()
    {
        return $this->hasMany('App\Models\Mouvement', 'mouvement_id');
    }

    /**
     * A Debit can have many compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function compte()
    {
        return $this->hasMany('App\Models\Compte', 'compte_id');
    }

}