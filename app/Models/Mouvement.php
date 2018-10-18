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

    protected $fillable = ['compte_id','budget_id','type','libelle','debit_id','credit_id','date'];
    
    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = ['compte_id','budget_id','type','libelle','debit_id','credit_id','date'];

     /**
      * A Mouvement can have on debit
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasOne
      */

      public function credit()
      {
          return $this->belongsTo('App\Models\Credit');
      }

      /**
       * A Mouvement can have on credit
       * 
       * @return \Illuminate\Database\Eloquent\Relations\HasOne
       */

       public function debit()
       {
           return $this->belongsTo('App\Models\Debit');
       }

       /**
        * A Mouvement can have many Compte
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */

        public function compte()
        {
            return $this->belongsTo('App\Models\Compte');
        }

        /**
         * A Mouvement can have many budget
         * 
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */

         public function budget()
         {
             return $this->belongsTo('App\Models\Budget');
         }
         
         /**
          * somme d'un tableau
          *
          * @param array $tableau
          * @return decimal $somme
          */

          public function somme($tableau){
              $sum = 0;
              foreach($tableau as $tb){
                  $sum += $tb;
              }
              return $sum;
          }
}
