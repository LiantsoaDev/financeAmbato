<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model 
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'realisations';

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

    protected $fillable = array('compte_id','budget_id','total','date');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */
    
    protected $visible = array('compte_id','budget_id','total','date');

    /**
     * fonction qui recuperer la totale de la realisation 
     * 
     * @var null
     * @return \Illuminate\Http\Response
     */

     public function totale(Mouvement $mouv){
         $get = self::where('compte_id',$mouv->compte_id)->where('budget_id',$mouv->budget_id)->first();
         if( !is_null($get) )
            return $get->total;
        else
            return $get = 0;
     }

     /**
      * une realisation appartient à un compte
      *
      * @return Illuminate\Database\Eloquent\belongsTo::class
      */

     public function compte()
     {
         return $this->belongsTo('App\Models\Compte');
     }

     /**
      * une realisation est associé à un budget
      *
      * @return \Illuminate\Database\Eloquent\HasMany::class
      */

      public function budget()
      {
          return $this->belongsTo('App\Models\Budget', 'budget_id');
      }

}