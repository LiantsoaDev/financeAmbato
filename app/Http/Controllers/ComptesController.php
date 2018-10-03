<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;

class ComptesController extends Controller
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
}
