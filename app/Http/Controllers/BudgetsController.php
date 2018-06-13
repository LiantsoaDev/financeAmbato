<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Budget;

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
    * Display a listing of the resource. 
    * 
    * @return Illuminate\Http\Response 
    */

    public function index()
    {   
        $comptes = Compte::all();
    	return view('budget.index',compact('comptes'));
    }

    /**
    * Show the form for creating a new resource.
    * 
    * @return Illuminate\Http\Request 
    */

    public function create(Request $request)
    {
        $action = route('update.budget');
        $comptes = Compte::all();
        return view('budget.create',compact('comptes','action'));
    }

    /**
    * Store a newly created resource in storage.
    * 
    * @return Illuminate\Http\Request
    */

    public function store(Request $request)
    {

    }

    /**
   * Update the specified resource in storage.
   *
   * @param  Illunminate\Http\Request 
   * @return Illunminate\Http\Response
   */

    public function update(Request $request)
    {
        $data = $request->all();
        $array = [];
        $i = 0;

        foreach( $data as $key => $value )
        {
            $i++;
            if( $i>9 && $i<99)
                $id = substr($key, -2, 2 );
            elseif( $i<9 )
                $id = substr($key, -1, 1 );
            else
                $id = substr($key, -3, 3 );

            if( 'libelle' . $id == $key )
            {
                $array[$id] = ['libelle' => $value , 'montant' => $data['montant'.$id] ];
            }
        }
        dd($array);
    }


}
