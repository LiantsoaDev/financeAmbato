<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Budget;
use Carbon\Carbon;
use Auth;
use App\Models\Budgetisation;

class BudgetsController extends Controller
{

    /**
    * create a new instance of class
    * 
    * @return Illuminate\Http\Response
    */

    public function __construct()
    {

    }

    /**
    * Affichage pour ajouter un nouveau budget
    * 
    * @return Illuminate\Http\Request 
    */

    public function create(Request $request)
    {
        $annee = Carbon::now()->addYears(1)->format('Y');
        $action = route('insert.budget');
        $comptes = Compte::all();
        return view('budget.create',compact('comptes','action','annee'));
    }

    /**
   * Insertion d'un bugdet antérieur dans la base de donnée
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
        foreach ($request->header() as $key => $val) {
            if( $key == 'id')
                $request->year = $val[0];
        }
        foreach ($data as $key => $value)
        {
            if( !empty($value) )
            {
                //get les caracteres numeriques d'une chaine de caractere
                $request->montant = preg_replace('~\D~', '', $value);
                $request->compte_id = str_replace("montant","",$key);
                //verifier si un budget existe deja pour un compte
                $date = new DatesController($request->year);
                /** 
                * get budget_id et comparer si l'id existe dans l'Entite Budgetisation
                * if true : Budgetisation existe
                */
                $budget = Budget::where('annee_id',$date->list()->id);
                foreach ($budget as $b) {
                    
                }

                if (!is_null($get)){
                     //if true : update
                    $update = $this->update(request);
                }
                else{
                    //else : insert 
                    $new = new Budget();
                    $new->entite_id = Auth::user()->entite_id;
                    $new->annee_id = $date->list()->id;
                    $new->montant = $request->montant;
                    $new->comptes($request);
                    $new->save();
                }
            }
        }
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
      * Modifier une Instance  budget
      * 
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */

      public function update(Request $request)
      {
          $validation = $this->validate($request,['montant' => 'required|numeric'],[
              'required'=>'Le Champ :attribute est obligatoire',
              'numeric' =>'Le Champ :attribute doit être numerique']);
            $upt = Budget::findOrFail($request->id);
            $upt->montant = $request->montant;
            $upt->save();
      }

      /**
       * Show form to Create a budget for the previous year
       * 
       * @param \Illuminate\Http\Request $request
       * @return \Illuminate\Http\Response
       */

       public function manual(Request $request)
       {
           $validation = $this->validate($request,[
               'year' => 'required|numeric'
           ],[
               'date' => 'Vous devez séléctionner une année budgetaire'
           ]);
            $annee = $request->year;
            $action = route('insert.budget');
            $comptes = Compte::all();
            return view('budget.create',compact('comptes','action','annee'));
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
            $years = [ 
                Carbon::now()->format('Y'),
                Carbon::now()->subYears(1)->format('Y'),
                Carbon::now()->subYears(2)->format('Y'),
                Carbon::now()->subYears(3)->format('Y')  
            ];
            return view('budget.select',compact('years','action'));
        }

        /**
         * Relier avec un compte
         * 
         * @param \Illuminate\Http\Request
         * @return \Illuminate\Http\Response
         */

         public function comptes(Request $request){
            try{
                $budget = new Budgetisation();
                $budget->budget_id = $request->budget_id;
                $budget->compte_id = $request->compte_id;
                $budget->save();
            }
            catch(Exception $e){
                report($e);
            }
         }
}
