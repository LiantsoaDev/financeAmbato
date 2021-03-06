<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Realisation;
use App\Models\Budget;

use App\Http\Controllers\DatesController;
use App\Http\Controllers\MouvementsController;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $realisation = [];
        $comptes = Compte::all();

        //realisations de l'année précedente
       $date = new DatesController();
       $info_precedente = $date->precedente();

       //budget de l'annee precedente
       if( count(Budget::first()) >= 1 )
       {
            foreach($comptes as $c){
                $current_budget = Budget::where('annee_id',$date->list()->id)->where('compte_id',$c->id)->first();

                if( !empty($info_precedente->id) )
                    $ancien_budget = Budget::where('annee_id',$info_precedente->id)->where('compte_id',$c->id)->first();
                else
                    $ancien_budget = new \StdClass();
                        
                if( !empty($c->id) ){
                        $realisations = Realisation::whereYear('date',Carbon::now()->format('Y'))->where('compte_id',$c->id)->first();
                }
                $realisation[$c->compte] = [
                    'realisation'=>(!empty($realisations->total) ? $realisations->total : '0.00'),
                    'budget'=>(!empty($current_budget->montant) ? $current_budget->montant : '0.00'),
                    'precedente'=> (!empty($ancien_budget->montant) ? $ancien_budget->montant : '0.00')
                ];
            }

       }else{
            $comptes = $realisation = [];
       }

       return view('home',compact('comptes','realisation'));
    }

    /**
     * fonction qui montre les details d'un compte en affichant depuis son compte mere 
     * 
     * @param \Illuminate\Http\Request integer $compte
     * @return \Illuminate\Http\Response
     */

     public function detail_compte($compte){
         if( strlen($compte) >= 4 ){
             $mere = substr($compte,0,3);
             $mouvement = new MouvementsController();
             return $mouvement->etat($mere);
         }else{
             return back()->with('error','Vous ne pouvez pas voir les détails de ce compte de tenu de charge !');
         }
     }
}
