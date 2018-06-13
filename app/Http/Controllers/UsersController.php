<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    	$this->middleware('role:admin');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */

    public function index()
    {
    	return view('membre.index');
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
			'v_username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'v_password' => 'required|min:3',
            'v_entite' => 'required'
		]);

		$user = new User();
		$user->name = $request->v_username;
		$user->email = $request->email;
		$user->password = bcrypt($request->v_password);
		$user->role = $request->v_entite;

        if( $request->list )
            $user->entite_id = intval($request->list);
        
		$user->save();
		return redirect()->route('page.add.membre')->with('success',"L'utilisateur a été ajouté avec succés");
	}

}
