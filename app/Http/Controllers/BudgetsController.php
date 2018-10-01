<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\Budget;
use Carbon\Carbon;

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

    public function list()
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
        $action = route('insert.budget');
        $comptes = Compte::all();
        $option = false;
        return view('budget.create',compact('comptes','action','option'));
    }

    /**
   * insert a new specified resource in storage Budget
   *
   * @param  Illunminate\Http\Request 
   * @return Illunminate\Http\Response
   */

    public function insert(Request $request)
    {
        dd( $request->all() );

        $data = $request->all();
        $array = [];
        $i = 0;

        foreach ($data as $key => $value)
        {
            if( !empty($value) )
            {
                $id = str_replace("montant","",$key);
                $udpate = Budget::findOrFail($id);
                $update->montant = $value;
                $update->save();
            }
        }
    }

    /**
     * Show update form of instance of Budget
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
      * Update a new instance of Budget
      * 
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */

      public function update(Request $request)
      {
          //
      }

      /**
       * Show form to Create a budget for the previous year
       * 
       * @param \Illuminate\Http\Request $request
       * @return \Illuminate\Http\Response
       */

       public function importmanual(Request $request)
       {
            $action = route('insert.budget');
            $option = true;
            $comptes = Compte::all();
            $years = [ 
                Carbon::now()->format('Y'),
                Carbon::now()->subYears(1)->format('Y'),
                Carbon::now()->subYears(2)->format('Y'),
                Carbon::now()->subYears(3)->format('Y')  
            ];
            return view('budget.create',compact('comptes','action','option','years'));
       }
}
