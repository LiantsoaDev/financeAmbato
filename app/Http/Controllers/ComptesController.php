<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Debit;
use App\Models\Credit;
use \stdClass;

class ComptesController extends Controller
{

    private $attribute;
    /**
    * create a new instance of class
    * 
    * @return Illuminate\Http\Response
    */

    public function __construct(stdClass $request)
    {
        //assigner les proprietes
        $this->attribute = $request;
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function show()
    {

    }

    /**
     * listes des comptes 
     * 
     * @return \Illuminate\Http\Response
     */

    public function list()
    {   
        $comptes = Compte::all();
    	return view('budget.index',compact('comptes'));
    }

    /**
     * fonction qui identifie la nature d'un compte soit crediteur ou débiteur
     * 
     * @param \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */

    public function nature(){
        $first = substr($this->attribute->compte,0,1);
        if( $first === '6'){
            //le compte est debiteur
            return $this->debit();
        }
        elseif( $first === '7'){
            //le compte est crediteur
            return $this->credit();
        }
    }

    /**
     * Lorsqu' Un compte est debitteur 
     * 
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Responkse
     */

     public function debit(){
        $new = new Debit();
        $new->type = $this->attribute->type;
        $new->montant = $this->attribute->montant;
        $new->save();
        return ['nature' => 'debit', 'id' => intval($new->id)];
     }

     /**
      * Lorsqu'un compte est crediteur
      *
      * @param \Illuminate\Http\Request
      * @return \Illuminate\Http\Response
      */

      public function credit(){
        $new = new Credit();
        $new->type = $this->attribute->type;
        $new->montant = $this->attribute->montant;
        $new->save();
        return ['nature' => 'credit', 'id' => intval($new->id)];
      }
}
