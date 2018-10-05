<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealisationsController extends Controller
{
    
    /**
     * Create a new instance of Controller
     * 
     * @return void
     */

     public function __construct(){

     }

     /**
      * Affichage de la page index
      *
      * @param \Illuminate\Http\Request
      * @return \Illuminate\Http\Response
      */

      public function index(){
          return view('realisation.index');
      }
}
