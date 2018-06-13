<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entite;

class EntitesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    	//
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function show()
    {
    	$action = route('add.new.entity');
    	return view('entite.index',compact('action'));
    }

    /**
	* Show the form for creating a new resource.
	*
	* @param Illuminate\Http\Request $request
	* @return Response
	*/

	public function insert(Request $request)
	{
		$validation = $this->validate($request,[
			'v_entite' => 'required',
			's_entite' => 'required'
		]);

		$entite = new Entite();
		$entite->nom = $request->v_entite;
		$entite->type = $request->s_entite;
		$entite->save();
		return back()->with('success',"L'entité a été ajouté avec succès");
	}

	/**
   * Store a newly created resource in storage.
   *
   * @param integer
   * @return Response
   */

	public function store($type)
	{
		if( !is_null($type) && $type != 'birao' )
        {
            $getentites = Entite::where('type',$type)->get();
            if(!array_is_empty($getentites))
                return view('ajax.entite',compact('getentites'));
            else
                exit();
        }
	}
	  

}
