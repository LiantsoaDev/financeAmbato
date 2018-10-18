<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entite;

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
        
        if( $request->v_entite == 'birao'){
            $id = $this->main(); 
            $user->entite_id = intval($id);
        }
               
        if( $request->list )
            $user->entite_id = intval($request->list);
        
		$user->save();
		return redirect()->route('page.add.membre')->with('success',"L'utilisateur a été ajouté avec succés");
    }
    
    /**
     * fonction qui crée l'entité par défaut : Biraom-piangonana
     * 
     * @return \Illuminate\Http\Response
     */

     public function main(){
         //verifie si l'entite main existe deja 
         //si non : creation
         $entite = Entite::where('nom','main')->where('type','void')->first();
         if( is_null($entite) ){
            $new  = new Entite();
            $new->nom = 'main';
            $new->type ='void';
            $new->save();
            return $new->id;
         }else{
             //si ouii : get id entite
             return $entite->id;
         }
     }
}
