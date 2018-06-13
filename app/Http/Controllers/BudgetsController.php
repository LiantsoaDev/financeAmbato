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

        //$id = substr('abcdef', -1, 1);
    }


}
