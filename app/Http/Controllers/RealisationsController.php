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
                //verifie la nature de la derniere insertion si Credit ou Debit
                $nature = $compte->nature();
                if( !empty($nature->id) ){
                    if($this->insert($attribute,$nature)){
                        return back()->with('success',"Le Mouvement a été enregistré avec succès");
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

     public function insert(\stdClass $attribute, \stdClass $nature){
        try{
            //insertion d'un nouveau mouvement
            $insert = new Mouvement();
            $insert->compte_id = $attribute->id;
            $insert->libelle = $attribute->description;
            $insert->piece = $attribute->piece;
            $insert->cheque = $attribute->cheque;
            $budget = new BudgetsController();
            //verifie si budget existe
            $exist = $budget->progress();
            if( is_null($exist) ){
                //si Non: initialiser un budget pour l'année en cours 
                //et retourner l'id de celui ci
                $budget->compte = $insert->compte_id;
                $id_budget = $budget->initialize()->id;
            }else{
                //si oui retourner un l'id du budget en cours
                $id_budget = $budget->progress()->id;
            }
            $insert->budget_id = $id_budget;
            $insert->type = $attribute->type;
            if( !empty($nature->nature == 'credit') ){
                $insert->credit_id = $nature->id;
            }
            elseif( !empty($nature->nature == 'debit') ){
                $insert->debit_id = $nature->id; 
            }
            $insert->date = date('Y-m-d H:i:s',strtotime($attribute->date));
            $insert->save();
            return true;
        }
        catch(Exception $e){
            report($e);
            return false;
        }
    }

    /**
     * suppression d'une realisation et d'un mouvement
     * 
     * @param integer $budget
     * @return \Illuminate\Http\Response
     */

     public function delete($budget){
         try{
            //supprimer un ou plusieurs Mouvements
            $mouvement = Mouvement::findOrFail($budget);
            $mouvement->delete();
            return true;
         }catch(Exception $e){
             report($e);
         }
     }

     /**
      * fonction qui liste les mouvements d'un compte lors de l'année en cours
      *
      * @param integer $compte
      * @return \Illuminate\Http\Response
      */

      public function get($compte){
          $somme = [];
          $total = 0;
          $rapport = 0;
          //lister les mvts d'un compte
          $compte_id = Compte::where('compte',$compte)->first()->id;
          $mouvement = Mouvement::where('compte_id',$compte_id)->orderBy('created_at','desc')->get();
          foreach ($mouvement as $m) {
            if(!empty($m->debit->montant)){
                $somme[] = $m->debit->montant;
                $m->debit->montant = number_format($m->debit->montant, 2, ',', ' ');
            }
            elseif($m->credit->montant){
                $somme[] = $m->credit->montant;
                $m->credit->montant = number_format($m->credit->montant, 2, ',', ' ');
            } 
          }
          //somme des mouvements d'un compte
          $mouv = new Mouvement();
          $total = number_format($mouv->somme($somme),2,',',' ');
          //Calcul des rapports 
          return view('realisation.lists',compact('mouvement','total','rapport'));
      }

}
