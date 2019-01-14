<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use Carbon\Carbon;

class DatesController extends Controller
{
    private $date;
    private $check = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct($date=null)
    {
    	if( !is_null($date) ){
            $this->date = $date;
        }
        else{
            $this->date = Carbon::now()->format('Y');
        }
        if( !$this->exists() ){
            $this->create();
        }
    }

    /**
     * 
     */

    /**
     * Creation d'une nouvelle annee budgetaire
     * 
     * @param \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */

    public function create(){
        if( $this->check == false ){
            $new = new Annee();
            $new->annee = $this->date;
            $new->save();
        }
    }

    /**
     * verifier si l'année budgetaire existent
     * 
     * @param \Illuminate\Http\Request
     * @return boolean true if exists else false
     */

     public function exists(){  
        $get = Annee::where('annee',$this->date)->first();
        if( !is_null($get) ){
             //si le budget existe : true
            return $this->check = true;
        }else{
            //si le budget n'existe pas
            return $this->check;
        }   
     }

    /**
     * Assignation d'un budget à l'année budgetaire
     * 
     * @param Integer $budget
     * @return \Illuminate\Http\Response
     */

     public function assignBudget(int $budget)
     {
         $get = Annee::where('annee',$this->date)->first();
         $get->budget_id = $budget;
         $get->save();
     }
     
     /**
      * Listes les proprietes de l'Entite Annee
      * 
      * @param \Illuminate\Http\Request
      * @return void
      */

      public function list()
      {
          return Annee::where('annee',$this->date)->first();
      }

      /**
       * Listes des informations des Années précedentes
       * 
       * @return \Illuminate\Http\Response
       */

       public function precedente(){
           $precedente = Carbon::create($this->date)->subYear(1)->format('Y');
           $info_date = Annee::where('annee',$precedente)->first();
           return $info_date;
       }

}
