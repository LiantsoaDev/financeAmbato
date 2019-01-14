<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Compte extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'comptes';

    /**
    * The Attributes that have timestamps
    *
    * @var array
    */

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('id','compte', 'libelle', 'type');

    /**
     * The attributes that are mass visibles.
     *
     * @var array
     */

    protected $visible = array('id','compte', 'libelle', 'type');

    /**
     * A compte can have many credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function credit()
    {
        return $this->hasMany('App\Models\Credit', 'compte_id');
    }

    /**
     * A Compte belongsTo debit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function debit()
    {
        return $this->belongsTo('App\Models\Debit');
    }

     /**
     * A Compte belongsTo budget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function budget()
    {
        return $this->hasMany('App\Models\Budget','budget_id');
    }

    /**
     * A Compte belongsTo Realisation
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function realisation()
     {
        return $this->belongsTo('App\Models\Realisation');
     }

    /**
    * getter of libelle
    * 
    * @return string 
    */

    public function getLibelleAttribute($value)
    {
        if( !is_null($value) )
            return ucfirst(strtolower($value));
        else
            return $value;
    }

    /**
    * getter of type
    * 
    * @return string 
    */

    public function getTypeAttribute($value)
    {
        if( !is_null($value) )
            return $value;
        else
            return ' - ';
    }

    /**
     * Requete qui prend la valeur d'un budget par rapport à un compte
     * 
     * @var null
     * @return Illuminate\Support\Facades\DB
     */

     public function joinedBudget(){
         return DB::table('comptes')
                    ->select('comptes.compte','comptes.libelle','comptes.type','budgets.montant')
                    ->join('budgets','budgets.compte_id','=','comptes.id');
     }

     public function mouvement()
     {
         return $this->belongsTo('App\Models\Mouvement');
     }
}