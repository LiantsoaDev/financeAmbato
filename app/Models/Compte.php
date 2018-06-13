<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    protected $fillable = array('compte', 'libelle', 'type');

    /**
     * The attributes that are mass visibles.
     *
     * @var array
     */

    protected $visible = array('compte', 'libelle', 'type');

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
        return $this->belongsTo('App\Models\Budget');
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
}