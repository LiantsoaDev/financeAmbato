<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Realisation;
use App\Models\Compte;
use App\Models\Mouvement;
use Carbon\Carbon;

class MouvementsController extends Controller
{
    /**
     * property
     */

     /**
      * function construct
      *
      * @return void
      */

      public function __construct(){
          //
      }

      /**
       * fonction index Journal
       * 
       * @param null
       * @return \Illuminate\Http\Response
       */

       public function journal(){
           $current = Carbon::now()->format('Y');
           $listes = Realisation::whereYear('date',$current)->get();
           return view('journal.index',compact('listes'));
       }

       /**
        * fonction qui montre les etats d'un compte
        * 
        * @param \Illuminate\Http\Request integer $compte
        * @return \Illuminate\Http\Response
        */

        public function etat($compte){
            $realisation = new RealisationsController();
            $allrealisations = $realisation->allrealisations($compte);
            $account = Compte::where('compte',$compte)->first();
            return view('journal.etat',['mouvements' => $allrealisations['mouvement'], 'total' => $allrealisations['total'], 'rapport' => $allrealisations['rapport'], 'compte' => $account ]);
        }
}
