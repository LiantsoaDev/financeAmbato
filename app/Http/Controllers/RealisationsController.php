<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Http\Controllers\ComptesController;
use App\Models\Mouvement;
use Auth;
use App\Http\Controllers\BudgetsController;

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
          $action = action('RealisationsController@add');
          return view('realisation.index',compact('allcount','action'));
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
        * Ajout d'un mouvement
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
            //connaitre si le compte est debiteur ou crediteur
            for($i=0; $i<count($request->invE_item); $i++){
                //declaration d'une object vide
                $attribute = new \stdClass();
                $attribute->date = $request->invE_item[$i];
                $attribute->type = $request->type[$i];
                $attribute->description = $request->invE_description[$i];
                $attribute->montant = $request->invE_unit_cost[$i];
                $attribute->piece = $request->piece[$i];
                $attribute->cheque = $request->cheque[$i];
                $attribute->compte = $request->compte;
                $attribute->id = $request->compte_id;
                $compte = new ComptesController($attribute);
                //type de retour de la derniere insertion Credit ou Debit
                $nature = $compte->nature();
                if( is_integer($nature['id'] )){
                    if( $nature['nature'] == 'debit' ){
                        //insertion  d'un mouvement
                        $this->insert($attribute,$nature);  
                    }
                }
            }
            return back()->with('success',"Les mouvements ont été bien enregistrées");
        }
    /**
     * insertion d'un mouvement
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

     public function insert(\stdClass $attribute, array $nature){
        $insert = new Mouvement();
        $insert->compte_id = $attribute->id;
        $budget = new BudgetsController();
        $insert->budget_id = $budget->current()->id;
        $insert->type = $attribute->type;
        if( !empty($nature['nature'] == 'credit') ){
            $insert->credit_id = $nature['id'];
        }
        elseif( !empty($nature['nature'] == 'debit') ){
            $insert->debit_id = $nature['id'];
        }
        $insert->date = $attribute->date;
        $insert->save();
        return true;
     }
}
