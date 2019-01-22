<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Budget;
use Carbon\Carbon;
use App\Models\Annee;
use App\Models\Budgetisation;
use App\Http\Controllers\DatesController;
use Auth;
use Hash;

class BudgetsController extends Controller
{
    /**
     * propriete de la classe
     */

    public $compte = null;
    public $annee = null;

    /**
    * create a new instance of class
    * 
    * @return Illuminate\Http\Response
    */

    public function __construct()
    {
        //
    }

    /**
    * Affichage pour ajouter un nouveau budget
    * 
    * @return Illuminate\Http\Request 
    */

    public function create(Request $request)
    {
        $budget = null;
        $annee = Carbon::now()->addYears(1)->format('Y');
        $action = route('insert.budget');
        $comptes = Compte::all();
        return view('budget.create',compact('comptes','action','annee','budget'));
    }

    /**
   * Insertion d'un bugdet dans la base de donnée
   *
   * @param  Illunminate\Http\Request 
   * @return Illunminate\Http\Response
   */

    public function insert(Request $request)
    {
        $data = $request->all();
        $array = [];
        $i = 0;
        //recuperation de l'annee budgetaire
        foreach ($request->header() as $cle => $val) {
            if( $cle == 'id')
                $request->year = $val[0];
        }
        foreach ($data as $key => $value)
        {
            if( !empty($key) )
            {
                //get les caracteres numeriques d'une chaine de caractere
                $request->montant = preg_replace('~\D~', '', $value);
                $request->compte_id = str_replace("montant","",$key);
                //verifier si un budget existe deja pour un compte pour une annee budgetaire
                //creation et initialisation du budget 
                $date = new DatesController($request->year);
                $budget = Budget::where('annee_id',$date->list()->id)->where('compte_id',$request->compte_id)->first();
                if( !is_null($budget) ){
                    //update un budget dans une annee budgetaire
                    $budget->montant = $request->montant;
                    $budget->save();
                }else{
                    //insert un nouveau budget
                    if(!empty($request->montant)){
                       $this->add($request);
                    }
                }
            }
        }
    }
    /**
     *  Ajout d'un budget
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response 
     */

     public function add(Request $request){
            $date = new DatesController($request->year);
            $new = new Budget();
            $new->entite_id = Auth::user()->entite_id;
            $new->annee_id = $date->list()->id;
            $new->compte_id = $request->compte_id;
            $new->montant = $request->montant;
            $new->save();
     }
    
    /**
     * Affichage de la formulaire de modification budget
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response 
     */

     public function show(Request $request)
     {
        $id = $request->get('id');
        $datas = Compte::findOrFail($id);
        $action = action('BudgetsController@update');
        return view('budget.update',compact('datas','action'));
     }


      /**
       * Afficher la formulaire d'ajout manuel d'un budget pour les années précedentes
       * 
       * @param \Illuminate\Http\Request $request
       * @return \Illuminate\Http\Response
       */

       public function manual(Request $request)
       {
            $annee = $request->year;
            $action = route('insert.budget');
            $comptes = Compte::all();
            $date = new DatesController($request->year);
            $get_budget = Budget::where('annee_id',$date->list()->id)->get();
            $budget = [];
            foreach($get_budget as $key => $value){
                $budget[$value->compte_id] = $value->montant;
            }
            
            return view('budget.create',compact('comptes','action','annee','budget'));
       }

       /**
        * Affichage de la selection de l'annee budgetaire 
        * 
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function selection()
        {
            $action = action('BudgetsController@manual');
            $delete = action('BudgetsController@confirmation');
            $years = [ 
                Carbon::now()->format('Y'),
                Carbon::now()->subYears(1)->format('Y'),
                Carbon::now()->subYears(2)->format('Y'),
                Carbon::now()->subYears(3)->format('Y')  
            ];
            //listes des annees budgetaires existants
            $annee_budgetaire = Annee::all();
            return view('budget.select',compact('years','action','annee_budgetaire','delete'));
        }

    /**
     * Method : GET, appeller un budget depuis un url
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    
     public function select_budget($annee){
         $request = new Request();
         $request->year = $annee;
         return $this->manual($request);
     }

     /**
      * Confirmation de la suppression d'un budget 
      *
      * @param \Illuminate\Http\Request
      * @return \Illuminate\Http\Response
      */

      public function confirmation(Request $request){
          //verification de l'identifiant de l'User avant suppression
          if( $this->validation($request) ){
              // if true : supprimer tous les budgets dans la table budget
              $this->delete($request);
              return back()->with('success',"Le budget a été supprimé avec succès");
          }
          else{
              //if false
              return back()->with('error',"Identification eronee");
          }
          
      }

      /**
       * Verification d'un mot de passe avant suppression
       * 
       * @param \Illuminate\Http\Request
       * @return \Illuminate\Http\Response
       */

       public function validation(Request $request)
       {
            $validation = $this->validate($request,[
                'password' => 'required'
            ],[
                'required' => 'Le champ :attribute est obligatoire'
            ]);
            //core
            if( Hash::check($request->password, Auth::user()->password))
                return true;
            else
                return false;
       }

       /**
        * Suppression du budget
        *
        * @param \Illuminate\Http\Request $request
        * @return \Illuminate\Http\Response
        */

        public function delete(Request $request){
            //Supprimer les Budgets de cette annee
            $tab_ids = [];
            $lists_id = Budget::where('annee_id',$request->id)->get(['id']);
            if( !empty($lists_id) ){
                foreach($lists_id as $ids){
                    $tab_ids[] = $ids->id;
                }
                //Supression grouper de tous les budgets
                $budget = Budget::destroy($tab_ids);
            }
            //suppression de l'annee budgetaire 
            $annee = Annee::findOrFail($request->id);
            $annee->delete();
        }

    /**
     * Registration des budgets
     * 
     * @param \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */

     public function registration(){
        return $this->selection();
     }

     /**
      * Obtenir les informations du budget actuel 
      *
      * @return \Illuminate\Http\Response
      */

      public function progress(){
          $annee = new DatesController();
          $this->annee = $annee->list()->id;
          $get = Budget::where('annee_id',$annee->list()->id)->first();
          if( !empty($get) ){
                return $get;
          }else{
                return null;
          }
      }

      /**
       * initialisation d'un nouveau budget
       * 
       * @return \Illuminate\Http\Response
       */

       public function initialize(){
           $init = new Budget();
           $init->annee_id = $this->annee;
           $init->entite_id = Auth::user()->entite_id;
           $init->compte_id = $this->compte;
           $init->montant = '00';
           $init->save();
           return $init;
       }

}
