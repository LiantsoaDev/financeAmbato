<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;

class RealisationsController extends Controller
{
    
    /**
     * Create a new instance of Controller
     * 
     * @return void
     */

     public function __construct(){

     }

     /**
      * Affichage de la page index
      *
      * @param \Illuminate\Http\Request
      * @return \Illuminate\Http\Response
      */

      public function index(){
          $allcount = Compte::all();
          return view('realisation.index',compact('allcount'));
      }

      /**
       * Get information supplementaire du compte via Ajax
       * 
       * @param \Illuminate\Http\Request 
       * @return \Illuminate\Http\Response
       */

       public function getCompteByAjax($str){
           $result = Compte::where('compte',$str)->first();
           return view('realisation.count-ajax',compact('result'));
       }

       /**
        * Ajout d'une realisation
        * 
        * @param \Illuminate\Http\Request
        * @return \Illuminate\Http\Response
        */

        public function add(Request $request){
            $validation = $this->validate($request,[
                'compte_id' => 'required|numeric'
            ],[
                'required' => 'Vous devez selectionner un compte avant d\'enregistrer'
            ]);

            

        }
}
