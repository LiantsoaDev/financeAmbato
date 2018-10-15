<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'mouvements';

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

    protected $fillable = ['compte_id','budget_id','type','debit_id','credit_id','date'];
    
    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = ['compte_id','budget_id','type','debit_id','credit_id','date'];

    /**
     * A Mouvement can have many compte
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function compte()
     {
         return $this->hasOne('App\Models\Compte', 'compte_id');
     }

     /**
     * A Mouvement can have many budget
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function budget()
     {
         return $this->hasOne('App\Models\Budget', 'budget_id');
     }

    /**
     * A Mouvement can have one annee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function annee()
     {
         return $this->hasOne('App\Models\Annee', 'annee_id');
     }
}
